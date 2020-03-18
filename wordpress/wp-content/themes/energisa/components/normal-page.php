<?php get_header(); ?>
<section id="ideias-banner">
    <div style="
            background: linear-gradient(0deg, rgba(8, 155, 192, 0.7), rgba(8, 155, 192, 0.7)), url(<?php bloginfo('template_url'); ?>/img/novidades-header.png);
            background-size: cover;
            background-position: center;
            background-blend-mode:  normal;
            " class="container-fluid   product-banner-holder px-0 ">
        <!-- text-white -->
        <div class="product-banner text-center text-white ">
        </div>
    </div>
</section>
<section>
    <div class="container-small mx-auto">
        <div data-aos="flip-left" class="  mb-2 ">
            <div class="pb-4 text-start mt-5">
                <h2 style="line-height: 60px;" class="font-weight-extra-bold text-caption display-h2">Titulo da pagina</h2>
                <h4 style="line-height: 60px;" class="font-weight-extra-bold text-caption">subtitulo da pagina, caso necessário</h4>
                <h2 style="line-height: 60px;" class="font-weight-extra-bold text-caption display-h2 text-orange">Titulo da pagina em laranga caso sheyla prefira o titulo em laranja</h2>
                <h4 style="line-height: 60px;" class="font-weight-extra-bold text-caption text-orange">subtitulo da em laranga caso sheyla prefira o subtitulo em laranja</h4>
            </div>

        </div>
    </div>
    <div class="container-small mx-auto">
        <p style="line-height: 42px;" class="text-dark font-weight-normal mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque nihil corrupti, mollitia possimus provident nam praesentium, numquam temporibus quo rem totam minus architecto? Quisquam similique incidunt maxime excepturi? Voluptatibus, aliquam!</p>
        <p style="line-height: 42px;" class="text-dark font-weight-normal mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque nihil corrupti, mollitia possimus provident nam praesentium, numquam temporibus quo rem totam minus architecto? Quisquam similique incidunt maxime excepturi? Voluptatibus, aliquam!</p>
        <p style="line-height: 42px;" class="text-dark font-weight-normal mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque nihil corrupti, mollitia possimus provident nam praesentium, numquam temporibus quo rem totam minus architecto? Quisquam similique incidunt maxime excepturi? Voluptatibus, aliquam!</p>
        <p style="line-height: 42px;" class="text-dark font-weight-normal mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque nihil corrupti, mollitia possimus provident nam praesentium, numquam temporibus quo rem totam minus architecto? Quisquam similique incidunt maxime excepturi? Voluptatibus, aliquam!</p>
    </div>
</section>
<section>
    <div class="container">
        <div id="parallax-bush-1">
            <div data-depth="0.1" class="d-flex justify-content-between">
                <div>
                    <img style="margin-top: 96px;" src="<?php bloginfo('template_url'); ?>/img/bush-sm.png" alt="">
                </div>
                <div>
                    <img src="<?php bloginfo('template_url'); ?>/img/bush-md.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "footer-nav.php"; ?>

<?php get_footer(); ?>




<!-- conteudo 404 -->
<?php get_header(); ?>
<section>
    <section id="product-banner">
        <div style="
                background: linear-gradient(0deg, rgba(92, 40, 14, 0.8), rgba(92, 40, 14, 0.8)), url(<?php bloginfo('template_url'); ?>/img/ideias-header.png);
                background-size: cover;
                background-position: center;
                background-blend-mode: multiply, normal;
                padding-bottom: 70px;
                " class="container-fluid   product-banner-holder px-0 ">
            <!-- text-white -->
            <div class="product-banner text-center text-white ">
                <h2 data-aos="fade-right"></h2>
            </div>
        </div>
    </section id="404-section">
    <div class="container">
        <div class=" not-found-text">

            <div class="text-center">

                <h1 style="font-size: 180px" class="text-orange font-weight-light pb-5">404</h1>
                <h3>Pagina não encontrada.</h3>
                <div class="d-flex justify-content-center my-2 pt-2">
                    <a href="<?php bloginfo('url'); ?>" class="btn p-0">
                        <p class="text-breadcrumb font-weight-bold mt-1"><i
                                class="fas pr-3 pt-1 fa-chevron-left"></i>Retornar
                            para <span class="text-orange">home</span></p>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <div class="pt-5" id="parallax-hand-1">
        <div data-depth="0.05" class="d-flex justify-content-center mb-auto">
            <img src="<?php bloginfo('template_url'); ?>/img/person-cut.png" alt="">
        </div>
    </div>

</section>
<?php include "footer-nav.php"; ?>

<?php get_footer(); ?>