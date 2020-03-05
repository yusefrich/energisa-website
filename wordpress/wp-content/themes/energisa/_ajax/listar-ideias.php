<?php


function listarIdeias()
{
    $tag = $_POST['tipo'];
    $page = $_POST['page'];
    $status = $_POST['status'];

    $args = [
        'post_type' => 'ideias',
        'posts_per_page' => 6,
        'tag' => $tag,
        'meta_key' => 'ideia_status',
        'meta_value' => $status,
        'paged' => $page,
    ];

    //Armazena a query
    $posts = new WP_Query($args);
    //Pega a quantidade de páginas
    $totalPages = $posts->max_num_pages;
    $pagina = $posts->query_vars['paged'];
    $hasNext = true;

    if ($totalPages == $pagina)
        $hasNext = false;
    ?>

    <?php
    // Verifica se tem posts na query
    if ($posts->have_posts()) {

        // Array que vai armazenar todos os posts
        $itens = [];

        // Cria o loop
        while ($posts->have_posts()) {
            $posts->the_post();

            //$foto = get_field('autor_foto', 'user_' . get_the_author_id());
            $foto = get_avatar_url(get_the_author_id(), array("size" => 150));
            $user = get_the_author_firstname() . " " . get_the_author_lastname();

            $post_tags = get_the_tags(get_the_ID());

            $arr_tags = [];
            if ($post_tags) {
                foreach ($post_tags as $tag) {
                    array_push($arr_tags, $tag->name);
                }
            }

            $statusFiled = get_field('ideia_status');

            // Armazena todos os campos do post
            $item = [
                'ID' => get_the_ID(),
                'titulo' => get_the_title(),
                'status' => esc_html($statusFiled['label']),
                //'foto' => $foto['sizes']['thumbnail'],
                'foto' => $foto,
                'votos' => get_field('ideia_votos') == '' ? '0' : get_field('ideia_votos'),
                'respostas' => get_comments_number(get_the_ID()),
                'user' => $user,
                'data' => get_the_time(__('d/m/Y'), get_the_ID()),
                'url' => get_the_permalink(),
                'tags' => $arr_tags
            ];

            // Puxa cada post para o array itens
            array_push($itens, $item);
        }

        // Envia na resposta todos os dados
        $resposta = [
            'hasNext' => $hasNext,
            'page' => $pagina,
            'pages' => $totalPages,
            'posts' => $itens
        ];

        wp_send_json_success($resposta);

    } else {
        $resposta = [
            'msg' => 'Nenhum post encontrado',
        ];

        wp_send_json_error($resposta);
    }
}

add_action('wp_ajax_listarIdeias', 'listarIdeias');
add_action('wp_ajax_nopriv_listarIdeias', 'listarIdeias');