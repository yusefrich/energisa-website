<?php


function equipeDetalhes()
{
    $indice = $_GET['indice'];

    $args = [
        'pagename' => 'quem-somos',
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
            $rows = get_field('sobre_equipe_repeat');

            $itens = [
                'nome' => $rows[$indice]['sobre_equipe_nome'],
                'cargo' => $rows[$indice]['sobre_equipe_cargo'],
                'foto' => $rows[$indice]['sobre_equipe_foto'],
                'biografica' => $rows[$indice]['sobre_equipe_bio'],
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

add_action('wp_ajax_equipeDetalhes', 'equipeDetalhes');
add_action('wp_ajax_nopriv_equipeDetalhes', 'equipeDetalhes');