<?php


function listarReleasesAll()
{

    $page = $_GET['page'] - 1;
    $hasNext = true;


    // Array que vai armazenar todas as releases
    $itens = [];
    ?>
    <?php
    $releases_produtos = new WP_Query(array(
        'post_type' => 'produtos',
        'post_status' => 'publish',
        'posts_per_page' => -1,
    ));

    while ($releases_produtos->have_posts()): $releases_produtos->the_post();
        //Pega o código rgba do card
        $campo_card_rgba = explode(',', get_field('prod_cor_background'));
        // Transforma a string em um array
        $card_rgba = "$campo_card_rgba[0],$campo_card_rgba[1],$campo_card_rgba[2],1";

        if (have_rows('flexible_content')):
            while (have_rows('flexible_content')): the_row();
                if (get_row_layout() == 'layout_prod_releases'):
                    while (have_rows('prod_releases_repeat')): the_row();
                        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                        date_default_timezone_set('America/Sao_Paulo');
                        $date_string = get_sub_field('prod_release_date');
                        $destinoUrl = get_sub_field('prod_link_release');
                        $release_url = get_sub_field('prod_linkinterno_release') != "" ? get_sub_field('prod_linkinterno_release') : get_sub_field('prod_linkexterno_release');

                        // Armazena todos os campos do post e da release
                        $item = [
                            'post_ID' => get_the_ID(),
                            'post_titulo' => get_the_title(),
                            'post_color' => $card_rgba,
                            'release_data' => date_i18n('j \d\e M  Y', strtotime($date_string)),
                            'datetime' => date_i18n('Y-m-j', strtotime($date_string)),
                            'ano' => date_i18n('Y', strtotime($date_string)),
                            'release_titulo' => get_sub_field('prod_release_title'),
                            'release_descricao' => get_sub_field('prod_release_desc'),
                            'release_target' => $destinoUrl,
                            'release_url' => $release_url,
                        ];

                        // Puxa cada release para o array itens
                        array_push($itens, $item);

                    endwhile;
                endif;
            endwhile;
        endif;
    endwhile;
    wp_reset_postdata(); ?>

    <?php
    $releases_projetos = new WP_Query(array(
        'post_type' => 'projetos',
        'post_status' => 'publish',
        'posts_per_page' => -1,
    ));

    while ($releases_projetos->have_posts()): $releases_projetos->the_post();
        //Pega o código rgba do card
        $campo_card_rgba = explode(',', get_field('projet_cor_background'));
        // Transforma a string em um array
        $card_rgba = "$campo_card_rgba[0],$campo_card_rgba[1],$campo_card_rgba[2],1";

        if (have_rows('projet_flexible_content')):
            while (have_rows('projet_flexible_content')): the_row();
                if (get_row_layout() == 'layout_projet_releases'):
                    while (have_rows('projet_releases_repeat')): the_row();
                        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                        date_default_timezone_set('America/Sao_Paulo');
                        $date_string = get_sub_field('projet_release_date');
                        $destinoUrl = get_sub_field('projet_link_release');
                        $release_url = get_sub_field('projet_linkinterno_release') != "" ? get_sub_field('projet_linkinterno_release') : get_sub_field('projet_linkexterno_release');

                        // Armazena todos os campos do post e da release
                        $item_projet = [
                            'post_ID' => get_the_ID(),
                            'post_titulo' => get_the_title(),
                            'post_color' => $card_rgba,
                            'release_data' => date_i18n('j \d\e M  Y', strtotime($date_string)),
                            'datetime' => date_i18n('Y-m-j', strtotime($date_string)),
                            'ano' => date_i18n('Y', strtotime($date_string)),
                            'release_titulo' => get_sub_field('projet_release_title'),
                            'release_descricao' => get_sub_field('projet_release_desc'),
                            'release_target' => $destinoUrl,
                            'release_url' => $release_url,
                        ];

                        // Puxa cada release para o array itens
                        array_push($itens, $item_projet);
                    endwhile;
                endif;
            endwhile;
        endif;
    endwhile;


    // Ordena o array pela chave datetime
    foreach ($itens as $key => $part) {
        $sort[$key] = strtotime($part['datetime']);
    }
    array_multisort($sort, SORT_DESC, $itens);

    //Total de itens do array
    $releases_count = count($itens);
    // Calcula a quantidade de páginas que será gerada: total de itens do array dividido pela quantidade de itens de cada página
    $paginas = ceil($releases_count / 3);

    if (($page + 1) >= $paginas) {
        $hasNext = false;
    }

    //array_chunk divide o array em dois em dois
    $releses = array_chunk($itens, 3);


    // Envia na resposta todos os dados
    $resposta = [
        'hasNext' => $hasNext,
        'total' => $releases_count,
        'page' => $page + 1,
        'pages' => $paginas,
        'releases' => $releses[$page]
    ];

    wp_send_json_success($resposta);
}

add_action('wp_ajax_listarReleasesAll', 'listarReleasesAll');
add_action('wp_ajax_nopriv_listarReleasesAll', 'listarReleasesAll');

