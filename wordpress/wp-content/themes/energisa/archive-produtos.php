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

            <div class="row mt-5" id="loadProducts"></div>

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
<?php get_footer(); ?>