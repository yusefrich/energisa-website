<?php get_header(); /* Template Name: Novidades */ ?>
<section id="product-banner">
    <div style="
            background: linear-gradient(0deg, rgba(8, 155, 192, 0.7), rgba(8, 155, 192, 0.7)), url(<?php bloginfo('template_url'); ?>/img/novidades-header.png);
            background-size: cover;
            background-position: center;
            background-blend-mode: multiply, normal;
            " class="container-fluid   product-banner-holder px-0 ">
        <!-- text-white -->
        <div class="product-banner text-center text-white ">
            <h1 data-aos="fade-right">Fique por dentro das novidades</h1>
            <p data-aos="fade-left" class="text-caption">Aqui vamos compartilhar as informações desenvolvido por nossa
                equipe, acompanhe nossas postagens e mantenha-se sempre bem informado.</p>
        </div>
    </div>
</section>


<section id="product-todos">
    <div class="container">
        <div class="text-center my-5">
            <img src="<?php bloginfo('template_url'); ?>/img/paper.png" alt="">
            <h1 class="text-orange">Nossos artigos</h1>
            <p style="max-width: 640px;" class="text-gray m-auto">Encontre abaixo nossas últimas postagens e fique por
                dentro do que anda acontecendo no nosso setor, fique bem informado</p>
        </div>

        <div class="row mt-5" id="loadNews"></div>

        <div class="row">
            <div class="col-md-12">
                <div data-aos="flip-left" class="col-md-12 text-center mt-4">
                    <button class="btn btn-outline-light px-5" data-pagina="1" id="btnLoadNews">
                        Mostrar mais
                    </button>
                </div>
            </div>
        </div>


        <div class="pt-5" id="parallax-hand-1">
            <div data-depth="0.5" class="d-flex justify-content-center mb-auto">
                <img src="<?php bloginfo('template_url'); ?>/img/person-cut.png" alt="">
            </div>
        </div>


    </div>

</section>
<?php get_footer(); ?>
