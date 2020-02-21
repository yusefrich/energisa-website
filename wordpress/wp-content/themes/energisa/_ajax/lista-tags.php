<?php
function listarTags()
{
    $page = $_GET['page'] - 1;
    $pagesize = $_GET['pagesize'];

    $hasNext = true;

    $total_tags = get_tags([
        'hide_empty' => true,
        'orderby' => 'count',
        'order' => 'DESC',
        'number' => 0,
        'offset' => 0,
    ]);

    $tags = get_tags([
        'hide_empty' => true,
        'orderby' => 'count',
        'order' => 'DESC',
        'number' => $pagesize,
        'offset' => $page * $pagesize,
    ]);

    // Calcula a quantidade de páginas que será gerada: total de itens do array dividido pela quantidade de itens de cada página
    $paginas = ceil(count($total_tags) / $pagesize);

    if (($page + 1) == $paginas) {
        $hasNext = false;
    }

    $itens = [];

    foreach ($tags as $tag) {
        $item = [
            'id' => $tag->term_id,
            'name' => $tag->name,
            'slug' => $tag->slug,
            'count' => $tag->count,
        ];
        // Puxa cada post para o array itens
        array_push($itens, $item);
    }

    // Envia na resposta todos os dados
    $resposta = [
        'hasNext' => $hasNext,
        'page' => $page + 1,
        'pages' => $paginas,
        'tags' => $itens
    ];

    wp_send_json_success($resposta);

}

add_action('wp_ajax_listarTags', 'listarTags');
add_action('wp_ajax_nopriv_listarTags', 'listarTags');