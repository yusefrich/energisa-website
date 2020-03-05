<?php
function likePost()
{
    $postID = (int)$_POST['postID'];
    $tipo = (int)$_POST['tipo'];

    // Pega o valor do campo do post informado
    $likes = (int)get_post_meta($postID, 'post_likes', true);

    if ($tipo == 1) {

        update_post_meta($postID, 'post_likes', $likes + 1, $likes);

    }
    if ($tipo == 2) {
        update_post_meta($postID, 'post_likes', $likes - 1, $likes);
    }

    // Pega o valor novamente depois da operação
    $likes = (int)get_post_meta($postID, 'post_likes', true);

    wp_send_json_success($likes);
}


add_action('wp_ajax_likePost', 'likePost');
add_action('wp_ajax_nopriv_likePost', 'likePost');
