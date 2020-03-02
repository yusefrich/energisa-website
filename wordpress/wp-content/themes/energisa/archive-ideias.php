<?php get_header(); ?>
<section id="ideias-banner">
    <div style="
            background: linear-gradient(0deg, rgba(92, 40, 14, 0.8), rgba(92, 40, 14, 0.8)), url(<?php bloginfo('template_url'); ?>/img/ideias-header.png);
            background-size: cover;
            background-position: center;
            background-blend-mode:  normal;
            " class="container-fluid   product-banner-holder px-0 ">
        <!-- text-white -->
        <div class="product-banner text-center text-white ">
            <h1 data-aos="fade-right">Vamos construir juntos?</h1>
            <p data-aos="fade-left" class="text-caption">Colabore e construa produtos melhores ajudando nossos clientes a ter a melhor satisfação com os nossos serviços</p>
        </div>

    </div>
</section>

<section id="ideias-todos">
    <div class="container">

        <div class="d-none d-sm-block text-start my-5 py-5">
            <img class=" float-left pr-5" src="<?php bloginfo('template_url'); ?>/img/ideias.png" alt="">
            <h2 class="text-orange display-h2">Colabore você também</h2>
            <p>Aqui você encontrará uma serie de ideias sugeridas pelos nossos colaboradores, fique a vontade para
                participar.</p>
            <a href="<?php bloginfo('home'); ?>/login" class="btn btn-primary px-5">Quero colaborar</a>

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
                </div>
            </div>
        </div>
    </div>

</section>

<?php include "footer-nav.php"; ?>

<?php get_footer(); ?>
