<?php
if (!function_exists('better_comments')):
    function better_comments($comment, $args, $depth)
    {
        $user = $comment->user_id ? get_userdata($comment->user_id) : false;
        $thumbnail = get_avatar_url($comment, array("size" => 150));
        ?>

        <li class="comment my-5">
            <div class="d-flex justify-content-start pb-4">
                <div class="profile-pic mr-4" style="background-image: url(<?php echo $thumbnail; ?>); background-size: cover;background-position: center;"></div>
                <div>
                    <span class="text-dark"><small>Postado em <?php echo get_comment_date('d\/m\/Y'); ?></small></span>
                    <?php if ($comment->comment_approved == '0') : ?>
                        <span class="text-orange role-tag-border float-right mx-3 px-2"><?php esc_html_e('Aguardando aprovação do moderador', '5balloons_theme') ?></span>
                    <?php endif; ?>
                    <p class="card-user-name m-0 font-weight-bold"> <?php echo $user->user_firstname . " " . $user->user_lastname ?></p>
                </div>
            </div>
            <?php comment_text() ?>
            <?php comment_reply_link(array_merge($args, array(
                    'reply_text' => __('Responder', 'textdomain'),
                    'depth' => $depth,
                    'max_depth' => $args['max_depth']
                )
            )); ?>

            <!--<button class="btn btn-outline-dark mr-2">Gostei (5)</button>-->
        </li>
        <!--<hr>-->
        <?php
    }
endif;