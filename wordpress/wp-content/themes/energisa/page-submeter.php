<?php get_header(); /* Template Name: Enviar ideia */ ?>
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
            <?php while (have_posts()) : the_post(); ?>
                <?php

                if (is_user_logged_in()):?>
                    <?php include(TEMPLATEPATH . '/inc/painel.php'); ?>
                    <div class="col-md-12 mb-3" id="formIdeia">
                        <?php the_content(); ?>
                    </div>

                <?php else: ?>
                    <?php wp_redirect(home_url());
                    exit; ?>
                <?php endif;
                ?>


            <?php endwhile; ?>
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

