<?php


function listarNovidades()
{
    $page = $_POST['page'];
    $categoria = $_POST['categoria'];

    $args = [
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'category_name' => $categoria,
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
            // Pega a foto de capa
            $capa_novidades = get_the_post_thumbnail_url(null, 'capa_380_255');

            // Armazena todos os campos do post
            $item = [
                'ID' => get_the_ID(),
                'titulo' => get_the_title(),
                'descricao' => get_the_excerpt(),
                'capa' => $capa_novidades,
                'url' => get_the_permalink(),
                'data' => get_the_time(__('j \d\e M  Y'), get_the_ID()),
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

add_action('wp_ajax_listarNovidades', 'listarNovidades');
add_action('wp_ajax_nopriv_listarNovidades', 'listarNovidades');