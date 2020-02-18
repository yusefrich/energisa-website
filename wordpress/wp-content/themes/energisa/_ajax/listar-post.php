<?php


function listarPosts()
{

    echo "Essa função PHP retorna a lista de posts";
    exit;
}

add_action('wp_ajax_listarPosts', 'listarPosts');
add_action('wp_ajax_nopriv_listarPosts', 'listarPosts');