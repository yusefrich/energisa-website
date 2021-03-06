<?php get_header(); /* Template Name: Perfil */ ?>
<section id="product-banner">
    <div style="
            background: linear-gradient(0deg, rgba(8, 155, 192, 0.7), rgba(8, 155, 192, 0.7)), url(<?php bloginfo('template_url'); ?>/img/novidades-header.png);
            background-size: cover;
            background-position: center;
            background-blend-mode: multiply, normal;
            " class="container-fluid   product-banner-holder px-0 ">
        <!-- text-white -->
        <div class="product-banner text-center text-white ">
            <h2 data-aos="fade-right">Editar Perfil</h2>
            <p>Edite as informações do seu perfil</p>
        </div>
    </div>
</section>
<section id="product-todos">
    <div class="container">
        <div class="row mt-5">
            <?php while (have_posts()) : the_post(); ?>
                <?php
                if (is_user_logged_in()):?>

                <?php $foto = get_avatar_url(get_current_user_id(), array("size" => 150));?>

                    <?php include(TEMPLATEPATH . '/inc/painel.php'); ?>
                    <div class="col-md-8 d-flex justify-content-center mb-3">
                        <div class="card col-md-12 p-5">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center mb-3">
                        <div class="card col-md-12">
                            <div class="pt-5 pl-5 pr-5 pb-0 text-center">
                                <img src="<?php echo $foto; ?>" class="card-img-top rounded-circle" style="max-width: 150px;" alt="...">
                            </div>

                            <div class="card-body">
                                <p class="card-text text-center" style="font-size: 16px;">Para alterar sua imagem de perfil, criei uma conta no site <a href="https://pt.gravatar.com/" title="https://pt.gravatar.com/" target="_blank" class="btn btn-link">pt.gravatar.com</a> usando o mesmo email e cadastre sua melhor foto.</p>
                            </div>
                        </div>
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

