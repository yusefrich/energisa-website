<?php get_header(); /* Template Name: Quem Somos */ ?>
<?php while (have_posts()) : the_post(); ?>
<?php $img_background = get_the_post_thumbnail_url(null, 'full'); ?>
<section id="quem-somos-banner">
    <div style="
                background: linear-gradient(0deg, rgba(8, 155, 192, 0.7), rgba(8, 155, 192, 0.7)), url(<?php echo esc_url($img_background); ?>);
                background-size: cover;
                background-position: center;
                background-blend-mode: multiply, normal;
                " class="container-fluid   product-banner-holder px-0 ">
        <!-- text-white -->
        <div class=" text-center text-white ">
            <h1 data-aos="fade-right" class="large-banner"><?php the_field('sobre_topo_titulo'); ?></h1>
            <p data-aos="fade-left" class="text-caption product-banner"><?php the_field('sobre_topo_desc'); ?></p>
        </div>
    </div>
</section>

<div class="container">
    <div id="parallax-detalhe-2">
        <div data-depth="0.2" class="d-flex justify-content-between">
            <div style="z-index: 1;" class="trace-detail-left ">
            </div>
            <div class="trace-detail-right trace-detail-offset-bottom">
                <img class="" src="<?php bloginfo('template_url'); ?>/img/detalhes-traco-azul.png" alt="">
            </div>
        </div>
    </div>
</div>
<section id="proposito">
    <div class="container">
        <div data-aos="fade-up" class="row my-5 py-5 ">
            <div class="col-md-5">
                <h2 class="text-orange font-weight-bold mt-5">Propósito</h2>
            </div>
            <div class="col-md-7">
                <p style="max-width: 450px;" class="text-caption text-dark"><?php the_field('sobre_proposito_text'); ?>
                </p>
            </div>
        </div>

    </div>
</section>
<div class="container">
    <div id="parallax-detalhe-3">
        <div data-depth="0.2" class="d-flex justify-content-between">
            <div style="z-index: 1;" class="trace-detail-left trace-detail-offset-bottom">
                <img class="" src="<?php bloginfo('template_url'); ?>/img/detalhes-traco-laranja.png" alt="">
            </div>
            <div class="trace-detail-right">
            </div>
        </div>
    </div>
</div>
<section id="nossa-equipe">
    <div data-aos="fade-left" class="container-fluid pl-0 pr-5">

        <div class="d-flex justify-content-end py-5">
            <div class="horizontal-orange-line"></div>
            <img src="<?php bloginfo('template_url'); ?>/img/nossa-equipe.png" alt="">


        </div>
        <div class="d-flex justify-content-end">

            <p style="max-width: 460px" class="text-caption text-right">Conheça nossa equipe e fique por dentro da
                Coordenação de Canais Digitais</p>
        </div>

    </div>
    <div class="container ">

        <div data-aos="fade-up" class="row blog py-5">
            <div class="col-md-1 mt-4 pt-1">
                <a href="#blogCarousel" role="button" data-slide="prev" class="btn btn-primary btn-round mt-5"><span
                        class="icon pt-2 pb-2 pl-1 icon-prev-icon"></span></a>
            </div>
            <div class="col-md-10">
                <div id="blogCarousel" class="carousel slide" data-ride="carousel">

                    <!-- Carousel items -->
                    <div class="carousel-inner">


                        <div class="carousel-item active">
                            <div class="row">
                                <?php $count = 0; ?>
                                <?php while (have_rows('sobre_equipe_repeat')): the_row();
                                        ?>
                                <div class="col-md-3 text-center">
                                    <a href="#" class="mdEquipe" data-indice="<?php echo $count; ?>">
                                        <div style=" background-image: url(<?php the_sub_field('sobre_equipe_foto'); ?>); max-width:100%;"
                                            class="team-img-holder m-auto">
                                        </div>
                                    </a>
                                    <a href="#" class="mdEquipe" data-indice="<?php echo $count; ?>">
                                        <p class="font-weight-bold text-blue m-0">
                                            <?php the_sub_field('sobre_equipe_nome'); ?></p>
                                    </a>
                                    <a href="#" class="mdEquipe" data-indice="<?php echo $count; ?>">
                                        <p><?php the_sub_field('sobre_equipe_cargo'); ?></p>
                                    </a>
                                </div>
                                <?php $count++; ?>
                                <?php endwhile; ?>
                            </div>
                        </div>


                    </div>
                    <!--.carousel-inner-->
                </div>
                <!--.Carousel-->

            </div>
            <div class="col-md-1  mt-4 pt-1">
                <a href="#blogCarousel" role="button" data-slide="next" class="btn btn-primary btn-round mt-5"><span
                        class="icon pt-2 pb-2 pr-1 icon-next-icon"></span></a>
            </div>
        </div>

    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="equipeModal" tabindex="-1" role="dialog" aria-labelledby="equipeModalLabel"
    aria-hidden="true">
</div>

<section id="o-que-fazemos">
    <div data-aos="fade-up" class="container py-5 mt-5 mb-2">
        <h1 class="font-weight-bold text-orange"><?php the_field('sobre_fazemos_titulo'); ?></h1>
        <p style="max-width: 560px;"><?php the_field('sobre_fazemos_desc'); ?></p>


    </div>
    <div data-aos="fade-up" class="container-fluid p-0">
        <div class="card-slider" id="sobre-scroll-left">

            <?php
                $fazemos = new WP_Query(array(
                    'post_type' => array(
                        'projetos',
                        'produtos',
                        'treinamentos'
                    ),
                    'posts_per_page' => '-1',
                ));

                echo '<pre>';
                //print_r($fazemos);
                echo '</pre>';
                while ($fazemos->have_posts()): $fazemos->the_post();
                    $tipo_post = get_post_type();
                    $capa = "";
                    $color_bg = "";
                    $permalink = get_the_permalink();
                    $url =  "onclick=\"window.location='$permalink'\"";
                    $openInfo = "";

                    if ($tipo_post == "produtos") {
                        $capa = get_field('img_background');
                        $color_bg = get_field('prod_cor_background');
                    }
                    if ($tipo_post == "projetos") {
                        $capa = get_field('projet_background');
                        $color_bg = get_field('projet_cor_background');
                    }
                    if ($tipo_post == "treinamentos") {
                        $capa = esc_url(get_the_post_thumbnail_url(null, 'full'));
                        $color_bg = get_field('treina_cor_fundo');
                        $url = "";
                        $openInfo = "openTreinamento";
                    }
                    ?>

            <div data-post="<?php the_ID();?>"
                class="card card-sm card-bg-small text-white mb-2 mr-4 card-link-div <?php echo $openInfo;?>"
                <?php echo $url; ?>>
                <div class="img-holder-sm" style="
                                height: 100%;
                                background: linear-gradient(0deg, rgba(67, 67, 67, 0.6), rgba(67, 67, 67, 0.6)), url(<?php echo $capa; ?>);
                                background-blend-mode: multiply, normal;
                                background-position: center;
                                background-size: cover;">
                    <button class="btn btn-light btn-round btn-sm card-btn m-3">
                        <span class="icon pr-1 pt-1 icon-next-icon"></span></button>

                    <div class="card-img-overlay overlay-xs text-start">
                        <p class="text-caption-lg font-weight-bold card-title-sm"><?php the_title(); ?></p>
                        <div class="overlay-status card-sub-sm">
                            <small class="outline-text py-1 text-uppercase px-3"><?php echo $tipo_post; ?></small>
                        </div>
                    </div>
                </div>
            </div>

            <?php endwhile;
                wp_reset_postdata(); ?>
        </div>


        <div class="d-flex justify-content-center">
            <p class="mt-3 text-gray">Navegue horizontalmente</p>
            <!-- <button class="btn arrow arrow__prev disabled"><i class="fas fa-chevron-left"></i></button> -->
            <!-- <div class="arrow arrow__prev disabled p-3"><i class="fas fa-chevron-left"></i></div> -->
            <!-- <button class="btn arrow arrow__next"><i class="fas fa-chevron-right"></i></button> -->
            <!-- <div class=" arrow arrow__next p-3"><i class="fas fa-chevron-right"></i></div> -->
            <button class="btn" id="left-arrow">
                <span class="icon  icon-prev-icon"></span>
            </button>
            <button class="btn" id="right-arrow">
                <span class="icon  icon-next-icon"></span>
            </button>
        </div>

    </div>
    <div class="container">
        <div id="parallax-bush-1">
            <div data-depth="0.1" class="d-flex justify-content-between">
                <div>
                    <img style="margin-top: 96px; " src="<?php bloginfo('template_url'); ?>/img/bush-sm.png" alt="">
                </div>
                <div>
                    <img style="" src="<?php bloginfo('template_url'); ?>/img/bush-md.png" alt="">
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Modal detalhes do treinamento -->
<div class="modal fade" id="OQueFazemosModal" tabindex="-1" role="dialog" aria-labelledby="OQueFazemosModalLabel"
    aria-hidden="true">

</div>

<?php endwhile; ?>
<?php get_footer(); ?>