<?php get_header(); ?>
<section id="product-banner">
    <div style="
            background: linear-gradient(0deg, rgba(8, 155, 192, 0.7), rgba(8, 155, 192, 0.7)), url(<?php bloginfo('template_url'); ?>/img/novidades-header.png);
            background-size: cover;
            background-position: center;
            background-blend-mode: multiply, normal;
            " class="container-fluid   product-banner-holder px-0 ">
        <!-- text-white -->
        <div class="product-banner text-center text-white ">
            <h2 data-aos="fade-right">Resultado de sua busca</h2>
        </div>
    </div>
</section>


<section id="product-todos">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 mb-5">
                <h5>
                    <?php
                    $resultadoPesquisa = new WP_Query("s=$s&showposts=0");
                    echo $resultadoPesquisa->found_posts . ' resultados para sua busca por: ';
                    echo $s;
                    ?>
                </h5>
            </div>

            <?php while (have_posts()) : the_post(); ?>
                <div class="col-md-4 mb-3">
                    <a class="card p-3" href="<?php the_permalink(); ?>">
                        <h5 class="font-weight-bold mb-3">Titulo do resultado</h5>
                        <?php the_title(); ?>
                    </a>
                </div>

            <?php endwhile; ?>
            <?php // wp_pagenavi(); ?>


        </div>

        <div class="pt-5" id="parallax-hand-1">
            <div data-depth="0.5" class="d-flex justify-content-center mb-auto">
                <img src="<?php bloginfo('template_url'); ?>/img/person-cut.png" alt="">
            </div>
        </div>

    </div>

</section>
<?php get_footer(); ?>
