<?php get_header(); /* Template Name: Enviar ideia */ ?>
<?php acf_form_head(); ?>
<section id="product-banner">
    <div style="
            background: linear-gradient(0deg, rgba(8, 155, 192, 0.7), rgba(8, 155, 192, 0.7)), url(<?php bloginfo('template_url'); ?>/img/novidades-header.png);
            background-size: cover;
            background-position: center;
            background-blend-mode: multiply, normal;
            " class="container-fluid   product-banner-holder px-0 ">
        <!-- text-white -->
        <div class="product-banner text-center text-white ">
            <h2 data-aos="fade-right">Cadastrar ideia</h2>
            <p>Cadastre sua ideia</p>
        </div>
    </div>
</section>
<section id="product-todos">
    <div class="container">
        <div class="row mt-5">

            <?php

            if (is_user_logged_in()):?>
                <?php include(TEMPLATEPATH . '/inc/painel.php'); ?>
                <div class="col-md-12 mb-3" id="formIdeia">

                    <?php acf_form(array(
                        'post_id' => 'new_post',
                        'post_title' => true,
                        'fields' => array('field_5e5c5df5f7152'),
                        'post_content' => true,
                        'new_post' => array(
                            'post_type' => 'ideias',
                            'post_status' => 'draft',
                            'uploader' => 'basic',
                        ),
                        'post_author' => get_current_user_id(),
                        'submit_value' => 'Enviar minha ideia',
                        'html_submit_button' => '<input type="submit" class="acf-button btn btn-primary mt-3" value="%s" />',
                        'updated_message' => __("Ideia enviada com sucesso", 'acf'),
                        'html_updated_message' => '<div id="message" class="updated"><p class="alert alert-success">%s</p></div>',

                    )); ?>

                </div>

            <?php else: ?>
                <script type="text/javascript">
                    window.location.href = "http://energisa.digital";
                </script>
            <?php endif;
            ?>


        </div>

        <div class="pt-5" id="parallax-hand-1">
            <div data-depth="0.5" class="d-flex justify-content-center mb-auto">
                <img src="<?php bloginfo('template_url'); ?>/img/person-cut.png" alt="">
            </div>
        </div>

    </div>
</section>
<?php include "footer-nav.php"; ?>

<?php get_footer(); ?>

