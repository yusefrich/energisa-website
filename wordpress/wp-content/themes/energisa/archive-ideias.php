<?php get_header(); ?>
<section id="ideias-banner">
    <?php
    $topo = new WP_Query(array(
        'pagename' => 'chamada-ideias',
    ));
    while ($topo->have_posts()): $topo->the_post();
        ?>
        <div style="
                background: linear-gradient(0deg, rgba(<?php the_field('page_interna_color'); ?>), rgba(<?php the_field('page_interna_color'); ?>)), url(<?php the_field('page_interna_img'); ?>);
                background-size: cover;
                background-position: center;
                background-blend-mode:  normal;
                " class="container-fluid product-banner-holder px-0 ">
            <!-- text-white -->
            <div class="text-center text-white ">
                <h1 style="max-width: 979px;" class="ml-auto mr-auto" data-aos="fade-right"><?php the_field('page_interna_titulo'); ?></h1>
                <p style="max-width: 1001px; letter-spacing: .2px; line-height: 42px;" data-aos="fade-left" class="text-caption ml-auto mr-auto">
                    <?php the_field('page_interna_desc'); ?></p>
            </div>
        </div>
    <?php endwhile;
    wp_reset_postdata(); ?>

</section>
<div class="container">
    <div id="parallax-detalhe-2">
        <div data-depth="0.2" class="d-flex justify-content-between">
            <div class="trace-detail-left">
            </div>
            <div style="top: -130px;" class="trace-detail-right ">
                <img class="" src="<?php bloginfo('template_url'); ?>/img/detalhes-traco-laranja.png" alt="">
            </div>
        </div>
    </div>

</div>
<section id="ideias-todos">
    <div class="container">

        <div class="d-none d-sm-block text-start my-5 py-5">
            <img class=" float-left pr-5 pt-4" src="<?php bloginfo('template_url'); ?>/img/ideias.png" alt="">
            <h2 class="text-orange display-h2">Colabore você também</h2>
            <p style="max-width: 850px;" class="mb-5">Aqui você encontrará uma serie de ideias sugeridas pelos nossos
                colaboradores, fique a vontade para
                participar.</p>
            <a style="padding: 8px 40px" href="<?php bloginfo('home'); ?>/login" class="btn btn-primary ">Quero
                colaborar</a>

        </div>
        <div class="d-sm-none text-center my-5 py-5">
            <img class="pr-5" src="<?php bloginfo('template_url'); ?>/img/ideias.png" alt="">
            <h2 class="text-orange display-h2">Colabore você também</h2>
            <p>Aqui você encontrará uma serie de ideias sugeridas pelos nossos colaboradores, fique a vontade para
                participar.</p>
            <a href="<?php bloginfo('home'); ?>/login" class="btn btn-primary px-5">Quero colaborar</a>

        </div>

        <div class="row">
            <?php get_sidebar(); ?>

            <div class="col-md-9">
                <div id="loadIdeias"></div>


                <div data-aos="flip-left" class="text-center mt-4 mb-5 pb-5">
                    <button class="btn btn-outline-light px-5" data-pagina="1" data-tipo="" id="btnLoadIdeias"> Mostrar
                        mais
                    </button>
                    <button class="btn btn-outline-light px-5 d-none" data-pagina="1" data-produto="" id="btnLoadIdeias2">
                        Mostrar
                        mais
                    </button>
                </div>
            </div>
        </div>
    </div>

</section>

<?php include "footer-nav.php"; ?>

<?php get_footer(); ?>
