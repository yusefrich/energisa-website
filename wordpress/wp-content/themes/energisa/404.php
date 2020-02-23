<?php get_header(); ?>
<section>
<section id="product-banner">
    <div style="
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url(<?php bloginfo('template_url'); ?>/img/novidades-header.png);
            background-size: cover;
            background-position: center;
            background-blend-mode: multiply, normal;
            " class="container-fluid   product-banner-holder px-0 ">
        <!-- text-white -->
        <div class="product-banner text-center text-white ">
            <h2 data-aos="fade-right"></h2>
        </div>
    </div>
</section id="404-section">
    <div class=" not-found-text">
        <div class="text-center">

            <h1 style="font-size: 150px" class="text-gray font-weight-light pb-5">404</h1>
            <h3>Pagina não encontrada.</h3>
        </div>
    </div>
    <div class="pt-5" id="parallax-hand-1">
            <div data-depth="0.05" class="d-flex justify-content-center mb-auto">
                <img src="<?php bloginfo('template_url'); ?>/img/person-cut.png" alt="">
            </div>
        </div>

</section>
<?php get_footer(); ?>
