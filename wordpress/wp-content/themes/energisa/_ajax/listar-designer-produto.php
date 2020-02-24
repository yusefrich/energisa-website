<?php


function designerProduto()
{
    $id_post = $_GET['id_post'];

    $args = [
        'post_type' => 'produtos',
        'p' => $id_post
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

            if (have_rows('flexible_content')):
                while (have_rows('flexible_content')): the_row();
                    if (get_row_layout() == 'layout_linha_tempo'):
                        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                        date_default_timezone_set('America/Sao_Paulo');
                        $date_string = get_sub_field('prod_data_tempo');

                        $count = 0;
                        if (have_rows('prod_linha_temporal')): while (have_rows('prod_linha_temporal')): the_row();


                            $item = [
                                'data' => strftime('%d de %b %Y', strtotime($date_string)),
                                'titulo' => get_sub_field('prod_titulo_tempo'),
                                'descricao' => get_sub_field('prod_desc_tempo'),
                                'processo' => get_sub_field('pord_designer_texto'),
                                'images' => get_sub_field('prod_designer_images'),

                            ];
                            array_push($itens, $item);
                            $count++;
                        endwhile;
                        endif;

                    endif;
                endwhile;
            endif;


        }

        wp_send_json_success($itens);

    } else {
        $resposta = [
            'msg' => 'Nenhum post encontrado',
        ];

        wp_send_json_error($resposta);
    }
}

add_action('wp_ajax_designerProduto', 'designerProduto');
add_action('wp_ajax_nopriv_designerProduto', 'designerProduto');