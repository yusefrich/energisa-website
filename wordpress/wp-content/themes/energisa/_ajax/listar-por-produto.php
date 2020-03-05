<?php
function listarPorProduto()
{
    $id = $_POST['id'];
    $page = $_POST['page'];

    $args_ideias = [
        'post_type' => 'ideias',
        'posts_per_page' => 6,
        'meta_key' => 'ideia_produto',
        'meta_value' => $id,
        'paged' => $page,
    ];

    $ideias = new WP_Query($args_ideias);

    //Pega a quantidade de páginas
    $totalPages = $ideias->max_num_pages;
    $pagina = $ideias->query_vars['paged'];
    $hasNext = true;

    if ($totalPages == $pagina)
        $hasNext = false;
    ?>

    <?php
    // Verifica se tem posts na query
    if ($ideias->have_posts()):

        // Array que vai armazenar todos os posts
        $itens = [];

        // Cria o loop
        while ($ideias->have_posts()):
            $ideias->the_post();

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

        endwhile;

        // Envia na resposta todos os dados
        $resposta = [
            'hasNext' => $hasNext,
            'page' => $pagina,
            'pages' => $totalPages,
            'posts' => $itens
        ];

        wp_send_json_success($resposta);

    else:
        $resposta = [
            'msg' => 'Nenhum post encontrado',
        ];

        wp_send_json_error($resposta);
    endif;

}

add_action('wp_ajax_listarPorProduto', 'listarPorProduto');
add_action('wp_ajax_nopriv_listarPorProduto', 'listarPorProduto');