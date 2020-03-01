<?php get_header(); ?>
<section id="projetos-banner">
    <div style="
            background: linear-gradient(0deg, rgba(92, 40, 14, 0.8), rgba(92, 40, 14, 0.8)), url(<?php bloginfo('template_url'); ?>/img/projetos-header.png);
            background-size: cover;
            background-position: center;
            background-blend-mode: multiply, normal;
            " class="container-fluid   product-banner-holder px-0 ">
            <!-- text-white -->
            <div class="product-banner text-center text-white ">
                <h1 data-aos="fade-right">Veja nossos projetos</h1>
                <p data-aos="fade-left" class="text-caption">Acompanhe todos os nossos projetos em andamento e fique por dentro das nossas atividades.</p>
            </div>
        </div>

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

        <div class="row mt-5" id="loadProjects"></div>


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
