<?php get_header(); ?>

    <section id="product-banner">
        <div style="
                background: linear-gradient(0deg, rgba(8, 155, 192, 0.7), rgba(8, 155, 192, 0.7)), url(<?php bloginfo('template_url'); ?>/img/product-header.png);
                background-size: cover;
                background-position: center;
                background-blend-mode: multiply, normal;
                " class="container-fluid   product-banner-holder px-0 ">
            <!-- text-white -->
            <div class="product-banner text-center text-white ">
                <h1>Confira nosso portfólio de produtos</h1>
                <p class="text-caption">Fique por dentro de todos os produtos feitos pela nossa equipe e sinta-se a
                    vontade para colaborar conosco.</p>
            </div>
        </div>
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

            <div class="row mt-5">
                <?php while (have_posts()) : the_post(); ?>
                    <div data-aos="flip-left" class="col-md-4">
                        <div class="card card-bg-small text-white mb-2 zoom-hover">
                            <!-- <img src="https://via.placeholder.com/1920x600" class="card-img" alt="..."> -->
                            <div class="img-holder-sm" style="
                                    background: linear-gradient(0deg, rgba(<?php the_field('prod_cor_background'); ?>), rgba(<?php the_field('prod_cor_background'); ?>)), url(<?php the_field('img_background'); ?>);
                                    background-position: center;
                                    background-size: cover;">
                                <a  href="<?php the_permalink(); ?>" class="btn btn-light btn-round btn-sm card-btn m-3">
                                    <span class="icon pt-2 pb-2 pr-2 icon-next-icon"></span></a>
                                <div class="card-img-overlay overlay-sm text-start">
                                    <a href="<?php the_permalink(); ?>">
                                        <h3 class="card-title"><?php the_field('prod_titulo'); ?></h3>
                                    </a>
                                    <a href="<?php the_permalink(); ?>">
                                        <p class="card-text"><?php the_field('prod_descricao'); ?></p>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>


                <div data-aos="flip-left" class="col-md-12 text-center mt-4">
                    <button class="btn btn-outline-light px-5"> Mostrar mais</button>
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
<?php get_footer(); ?>