<?php


function listarPostRelease()
{
    $postId = $_POST['postId'];
    $postType = $_POST['post_type'];
    $page = $_POST['page'] - 1;
    $hasNext = true;

    $postTypeFild = "";
    $flexible_content = "";

    if($postType === 'produtos'){
        $postTypeFild = "prod";
        $flexible_content = "flexible_content";
    } else{
        $postTypeFild = "projet";
        $flexible_content = "projet_flexible_content";
    }


    $post = get_fields($postId);

    // Array que armazena todas as releases
    $itens = [];

    foreach ($post as $chave => $valor) {
        if ($chave === $flexible_content) {
            $array2 = $post[$chave];
            foreach ($array2 as $chave2 => $valor2) {
                $array3 = $array2[$chave2];
                foreach ($array3 as $chave3 => $valor3) {
                    if ($chave3 === $postTypeFild.'_releases_repeat') {
                        $array4 = $array3[$chave3];
                        foreach ($array4 as $release) {

                            $campo_card_rgba = explode(',', $post[$postTypeFild.'_cor_background']);
                            $card_rgba = "$campo_card_rgba[0],$campo_card_rgba[1],$campo_card_rgba[2],1";

                            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                            date_default_timezone_set('America/Sao_Paulo');
                            $date_string = $release[$postTypeFild.'_release_date'];
                            $destinoUrl = $release[$postTypeFild.'_link_release'];
                            $release_url = $release[$postTypeFild.'_linkinterno_release'] != "" ? $release[$postTypeFild.'_linkinterno_release'] : $release[$postTypeFild.'_linkexterno_release'];

                            $item = [
                                'post_ID' => $postId,
                                'post_titulo' => $post[$postTypeFild.'_titulo'],
                                'post_color' => $card_rgba,
                                'release_data' => date_i18n('j \d\e M  Y', strtotime($date_string)),
                                'datetime' => date_i18n('Y-m-j', strtotime($date_string)),
                                'ano' => date_i18n('Y', strtotime($date_string)),
                                'release_titulo' => $release[$postTypeFild.'_release_title'],
                                'release_descricao' => $release[$postTypeFild.'_release_desc'],
                                'release_target' => $destinoUrl,
                                'release_url' => $release_url,

                            ];
                            array_push($itens, $item);
                        }
                    }
                }
            }
        }
    }


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

    $resposta = [
        'hasNext' => $hasNext,
        'total' => $releases_count,
        'page' => $page + 1,
        'pages' => $paginas,
        'releases' => $releses[$page]
    ];

    wp_send_json_success($resposta);

}

add_action('wp_ajax_listarPostRelease', 'listarPostRelease');
add_action('wp_ajax_nopriv_listarPostRelease', 'listarPostRelease');

