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