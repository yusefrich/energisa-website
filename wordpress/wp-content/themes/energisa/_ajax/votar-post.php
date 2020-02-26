<?php
function votarPost()
{
    $postID = (int)$_GET['postID'];
    $tipo = (int)$_GET['tipo'];

    //$tipo = 'like';

    // Pega o valor do campo do post informado
    $count = (int)get_field('ideia_votos', $postID);

// Incrementa o valor
    $count++;

// Atualiza o campo do post com o novo valor
    if ($tipo == 1) {
        update_field('ideia_votos', $count, $postID);
    }


    wp_send_json_success($count);
}


add_action('wp_ajax_votarPost', 'votarPost');
add_action('wp_ajax_nopriv_votarPost', 'votarPost');
