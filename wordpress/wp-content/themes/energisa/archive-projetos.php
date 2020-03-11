<?php get_header(); ?>
<section id="projetos-banner">
    <?php
    $topo = new WP_Query(array(
        'pagename' => 'chamada-projetos',
    ));
    while ($topo->have_posts()): $topo->the_post();
        ?>
        <div style="
                background-image:  url(<?php the_field('page_interna_img'); ?>);
                background-color: rgba(224, 75, 0, 0.89);
                background-size: cover;
                background-position: center;
                background-blend-mode: multiply;
                " class="container-fluid   product-banner-holder px-0 ">
            <!-- text-white -->
            <div class=" text-center text-white ">
                <h1 style="max-width: 979px;" data-aos="fade-right" class="mb-4 ml-auto mr-auto"><?php the_field('page_interna_titulo'); ?></h1>
                <p style="max-width: 841px; letter-spacing: .2px; line-height: 42px;" data-aos="fade-left" class="text-caption ml-auto mr-auto">
                    <?php the_field('page_interna_desc'); ?></p>
            </div>
        </div>
    <?php endwhile;
    wp_reset_postdata(); ?>
</section>

<section id="projetos-todos">
    <div class="container">
        <div class="text-center my-5">
            <img src="<?php bloginfo('template_url'); ?>/img/formas.png" alt="">
            <h2 class="text-orange display-h2">Confira o que estamos produzindo</h2>
            <p class="text-gray">Acompanhe todos os nossos projetos em andamento e fique por dentro das nossas
                atividades</p>
        </div>

        <div id="parallax-detalhe-2">
            <div data-depth="0.2" class="d-flex justify-content-between">
                <div class="trace-detail-left">
                    <img class="" src="<?php bloginfo('template_url'); ?>/img/detalhes-traco-laranja.png" alt="">
                </div>
                <div class="trace-detail-right">
                </div>
            </div>
        </div>

        <div class="row " id="loadProjects"></div>


        <div class="row">
            <div class="col-md-12">
                <div data-aos="flip-left" class="col-md-12 text-center mt-5">
                    <button class="btn btn-outline-light px-5  mt-4" data-pagina="1" id="btnLoadProjects">
                        Mostrar mais
                    </button>
                </div>
            </div>
        </div>

        <div id="parallax-bush-1">
            <div data-depth="0.1" class="d-flex justify-content-between">
                <div>
                    <img style="transform: scaleX(-1)" src="<?php bloginfo('template_url'); ?>/img/bush-md.png" alt="">
                </div>
                <div>
                    <img style="margin-top: 96px; transform: scaleX(-1)" src="<?php bloginfo('template_url'); ?>/img/bush-sm.png" alt="">
                </div>
            </div>
        </div>

    </div>

</section>

<?php include "footer-nav.php"; ?>

<?php get_footer(); ?>
