<?php


function treinamentoDetalhes()
{
    $ID = $_POST['id_post'];

    $args = [
        'p' => '273',
        'post_type' => 'treinamentos',
    ];

    //Armazena a query
    $posts = new WP_Query($args);

    // Verifica se tem posts na query
    if ($posts->have_posts()) {

        // Array que vai armazenar todos os posts
        $itens = [];

        // Cria o loop
        while ($posts->have_posts()) {
            $posts->the_post();



            $itens = [
                'id' => get_the_ID(),
                'titulo' => get_the_title(),
                'conteudo' => wpautop(get_the_content()),
                'descrição'=> get_the_excerpt(),
                'capa'=> get_the_post_thumbnail_url(null, 'full')
            ];

        }

        wp_send_json_success($itens);

    } else {
        $resposta = [
            'msg' => 'Nenhum post encontrado',
        ];

        wp_send_json_error($resposta);
    }
}

add_action('wp_ajax_treinamentoDetalhes', 'treinamentoDetalhes');
add_action('wp_ajax_nopriv_treinamentoDetalhes', 'treinamentoDetalhes');