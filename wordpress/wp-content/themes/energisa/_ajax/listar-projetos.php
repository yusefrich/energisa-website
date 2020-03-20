<?php


function listarProjetos()
{
    $page = $_POST['page'];

    $args = [
        'post_type' => 'projetos',
        'post_status' => 'publish',
        'posts_per_page' => 6,
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

            // Armazena todos os campos do post
            $item = [
                'ID' => get_the_ID(),
                'titulo' => get_field('projet_titulo'),
                'descricao' => get_field('projet_descricao'),
                'capa' => get_field('projet_background'),
                'bg_color' => get_field('projet_cor_background'),
                'status' => get_field('projet_status'),
                'url' => get_the_permalink(),
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

add_action('wp_ajax_listarProjetos', 'listarProjetos');
add_action('wp_ajax_nopriv_listarProjetos', 'listarProjetos');
