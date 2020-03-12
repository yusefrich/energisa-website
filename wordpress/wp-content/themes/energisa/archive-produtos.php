<?php get_header(); ?>
    <section id="product-banner">
        <?php
        $topo = new WP_Query(array(
            'pagename' => 'chamada-produtos',
        ));
        while ($topo->have_posts()): $topo->the_post();
            ?>
            <div style="
                    background: linear-gradient(0deg, rgba(<?php the_field('page_interna_color'); ?>), rgba(<?php the_field('page_interna_color'); ?>)), url(<?php the_field('page_interna_img'); ?>);
                    background-size: cover;
                    background-position: center;
                    background-blend-mode: multiply, normal;
                    " class="container-fluid   product-banner-holder px-0 ">
                <!-- text-white -->
                <div class=" text-center text-white ">
                    <h1 style="max-width: 979px;" class="mb-4 ml-auto mr-auto"><?php the_field('page_interna_titulo'); ?></h1>
                    <p style="max-width: 841px; letter-spacing: .2px; line-height: 42px;" class="text-caption ml-auto mr-auto"><?php the_field('page_interna_desc'); ?></p>
                </div>
            </div>
        <?php endwhile;
        wp_reset_postdata(); ?>
    </section>

    <section id="product-todos">
        <div class="container">
            <div class="text-center my-5">
                <img src="<?php bloginfo('template_url'); ?>/img/tools.png" alt="">
                <h1 class="text-orange">Confira todos</h1>
                <p class="text-gray">Fique por dentro de todos os nossos produtos</p>
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

            <div class="row" id="loadProducts"></div>

            <div class="row">
                <div class="col-md-12">
                    <div data-aos="flip-left" class="col-md-12 text-center mt-5">
                        <button class="btn btn-outline-light px-5 mt-4" data-pagina="1" id="btnLoadProducts">
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