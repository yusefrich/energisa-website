<?php
function listUserComments()
{
    $args = array(
        'status' => 'approve',
        'orderby' => 'comment_author',

    );
    $comments = get_comments($args);
    $itens = [];

    foreach ($comments as $comment) :
        $user = $comment->user_id ? get_userdata($comment->user_id) : false;
        $foto = get_avatar_url($comment, array("size" => 150));
        $item = [
            'usuario_id' => $comment->user_id,
            'usuario_email' => $comment->comment_author_email,
            'nome' => $user->user_firstname . " " . $user->user_lastname,
            'foto' => $foto,
            'count' => array_count_values(array_column($comments, 'user_id'))[$comment->user_id]
        ];

        array_push($itens, $item);
    endforeach;

// Função para remover os arrays duplicados
    function unique_multidim_array($array, $key)
    {
        $temp_array = array();
        $i = 0;
        $key_array = array();
        foreach ($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }

// Função para ordenar pela quantidade de comentários
    function cmp($a, $b)
    {
        return $a['count'] < $b['count'];
    }

    $details = unique_multidim_array($itens, 'usuario_email');
// Ordena
    usort($details, 'cmp');

    // Envia na resposta todos os dados
    $resposta = [
        'total' => count($details),
        'itens' => $details
    ];

    wp_send_json_success($resposta);
}

add_action('wp_ajax_listUserComments', 'listUserComments');
add_action('wp_ajax_nopriv_listUserComments', 'listUserComments');