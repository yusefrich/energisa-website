<?php
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

if (post_password_required()) { ?>
    <p class="nocomments">Este artigo está protegido por password. Insira-a para ver os comentários.</p>
    <?php
    return;
}
?>

<div id="comments">
    <h3 class="text-orange font-weight-bold mt-3 pt-5"><?php comments_number('0 Comentários', '1 Comentário', '% Comentários'); ?></h3>
    <hr>

    <?php if (have_comments()) : ?>

        <ul class="comment-list comments">
            <?php
            wp_list_comments(array(
                'style' => 'ul',
                'short_ping' => true,
                'callback' => 'better_comments'
            ));
            ?>
        </ul>


    <?php endif; ?>

    <?php if (comments_open()) : ?>

        <div id="respond">
            <h3>Deixe o seu comentário!</h3>

            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                <fieldset>
                    <?php if ($user_ID) : ?>

                        <p>Autentificado como
                            <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.
                            <a href="<?php echo wp_logout_url(home_url()); ?>" title="Sair desta conta">Sair desta conta &raquo;</a></p>
                        <label for="comment">Mensagem:</label>
                        <textarea name="comment" id="comment" rows="" cols=""></textarea>
                        <input type="submit" class="commentsubmit" value="Enviar Comentário"/>

                    <?php else : ?>
                       <?php echo do_shortcode('[wppb-login]'); ?>
                        <div class="row ">
                            <div class="col-md-6">
                                <p class="text-center">SemAinda não tem uma conta?<a style="font-size: 18px;" href="<?php the_permalink() ?>/register" title="Criar conta" class="btn btn-link mb-1">Criar Conta</a>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php comment_id_fields(); ?>
                    <?php do_action('comment_form', $post->ID); ?>
                </fieldset>
            </form>
            <p class="cancel"><?php cancel_comment_reply_link('Cancelar Resposta'); ?></p>
        </div>
    <?php else : ?>
        <h3>Os comentários estão fechados.</h3>
    <?php endif; ?>
</div>