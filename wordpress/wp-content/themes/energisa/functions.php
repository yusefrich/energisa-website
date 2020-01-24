<?php

//Remover a barra de administração do topo
remove_action('init', 'wp_admin_bar_init');
function my_function_admin_bar(){
    return false;
}
add_filter('show_admin_bar', 'my_function_admin_bar');



//adiciona suporte a imagem de desque e tamanhos personalizados
add_theme_support('post-thumbnails');

//remover a largura e algura fixa das tag img dentro dos pots
add_filter('post_thumbnail_html', 'remove_width_attribute', 10);
add_filter('image_send_to_editor', 'remove_width_attribute', 10);

function remove_width_attribute($html)
{
    $html = preg_replace('/(width|height)="\d*"\s/', "", $html);
    return $html;
}

//Função para adicionar a imagem destaca nas colunas
add_filter('manage_posts_columns', 'tcb_add_post_thumbnail_column', 5);

// Adiciona a Coluna
function tcb_add_post_thumbnail_column($cols)
{
    $cols['tcb_post_thumb'] = __('Capa');
    return $cols;
}

// Hook into the posts an pages column managing. Sharing function callback again.
add_action('manage_posts_custom_column', 'tcb_display_post_thumbnail_column', 5, 2);

// Grab featured-thumbnail size post thumbnail and display it.
function tcb_display_post_thumbnail_column($col, $id)
{
    switch ($col) {
        case 'tcb_post_thumb':
            if (function_exists('the_post_thumbnail')) echo the_post_thumbnail('thumbnail');
            else echo 'Not supported in theme';
            break;
    }
}



//carregar css personalziado para a página de login
function estilo_tela_login()
{
    wp_enqueue_style('custom-login', get_template_directory_uri() . '/assets/admin/css/style-login.css');
}

add_action('login_enqueue_scripts', 'estilo_tela_login');

//alterar a url da logo da página de login
function url_logo_login()
{
    return home_url();
}

add_filter('login_headerurl', 'url_logo_login');

//alterar o atributo title
function nome_titulo_login()
{
    return get_bloginfo('name', 'display');
}

add_filter('login_headertitle', 'nome_titulo_login');