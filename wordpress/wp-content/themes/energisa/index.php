<?php get_header(); ?>
    <div id="fullpage">
        <section class="section" id="home-carrousel">
            <div class="container-fluid p-0">
                <div style="background: linear-gradient(0deg, rgba(55, 55, 55, 0.4), rgba(55, 55, 55, 0.4)), url(<?php the_field('carousel_img_bg', 'options-carousel'); ?>);
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size: cover;"
                     class="index-banner d-flex">
                    <div class="container custom-carousel-caption">
                        <!--  d-none d-md-block -->
                        <div class="banner-title-center">
                            <div class="text-center">
                                <h2 class="highlight m-0"><?php the_field('carousel_titulo_principal_1', 'options-carousel'); ?></h2>
                                <br>
                                <h2 class="highlight"><?php the_field('carousel_titulo_principal_2', 'options-carousel'); ?></h2>
                            </div>
                            <p class="text-center"><?php the_field('carousel_tagline_one', 'options-carousel'); ?></p>
                        </div>
                        <div class="row bottom-text text-center mx-3">
                            <div class="col-md-6">
                                <div class="carousel-info pt-5 mt-5">
                                    <h3><?php the_field('carousel_titulo_secundario', 'options-carousel'); ?></h3>
                                    <p><?php the_field('carousel_tagline_two', 'options-carousel'); ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="carousel-info text-center">
                                    <div id="carouselExampleCaptions" class="carousel slide " data-ride="carousel">
                                        <div style="max-width: 710px" class="carousel-inner carousel-info-container">

                                            <?php if (have_rows('carousel_repeat_slides', 'options-carousel')): ?>
                                                <?php $contador = 0; ?>
                                                <?php while (have_rows('carousel_repeat_slides', 'options-carousel')): the_row(); ?>
                                                    <?php $contador++; ?>
                                                    <div class="carousel-item <?php if ($contador == 1) echo "active"; ?>">
                                                        <img class="py-3 banner-icon" src=" <?php the_sub_field('carousel_repeat_icone'); ?>" alt="">
                                                        <p class=" m-0">
                                                            <strong> <?php the_sub_field('carousel_repeat_titulo'); ?></strong>
                                                        </p>
                                                        <p><?php the_sub_field('carousel_repeat_tagline'); ?></p>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>

                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <div class="carousel-control-holder">
                                                <ol class="carousel-indicators">
                                                    <?php if (have_rows('carousel_repeat_slides', 'options-carousel')): ?>
                                                        <?php $contador = 0; ?>
                                                        <?php while (have_rows('carousel_repeat_slides', 'options-carousel')):
                                                            the_row(); ?>
                                                            <li data-target="#carouselExampleCaptions" data-slide-to="<?php echo $contador; ?>" class="<?php if ($contador == 0) echo "active"; ?>"></li>
                                                            <?php $contador++; ?>
                                                        <?php endwhile; ?>
                                                    <?php endif; ?>
                                                </ol>
                                                <div class="custom-control-carrousel custom-control-bottom">
                                                    <a href="#carouselExampleCaptions" role="button" data-slide="prev"
                                                       class="btn btn-primary btn-round mx-2"><span
                                                                class="icon pt-2 pb-2 pl-1 icon-prev-icon"></span></a>
                                                    <a href="#carouselExampleCaptions" role="button" data-slide="next"
                                                       class="btn btn-primary btn-round mx-2"><span
                                                                class="icon pt-2 pb-2 pr-1 icon-next-icon"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="pt-1 section" id="home-novidades">
            <div class="container">
                <div id="parallax-detalhe-1">
                    <div data-depth="0.2" class="d-flex justify-content-between">
                        <div class="trace-detail-left ">
                            <img class="" src="<?php bloginfo('template_url'); ?>/img/detalhes-traco-branco.png" alt="">
                        </div>
                        <div class="trace-detail-right trace-detail-offset-up">
                            <img class="" src="<?php bloginfo('template_url'); ?>/img/detalhes-traco-azul.png" alt="">
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <?php
                    $chamadaNovidades = new WP_Query(array(
                        'pagename' => 'chamada-novidades',
                    ));
                    while ($chamadaNovidades->have_posts()): $chamadaNovidades->the_post();
                        $img_background = get_the_post_thumbnail_url(null, 'full');
                        ?>

                        <div data-aos="fade-up" class="col-md-12">
                            <div class="card card-bg-wide text-white my-5 zoom-hover card-link-div" onclick="window.location='<?php the_field('link_interno'); ?>';">
                                <a style="display:block" href="<?php the_field('link_interno'); ?>">
                                    <div class="img-holder" style="
                                            background: linear-gradient(0deg, rgba(55, 55, 55, 0.4), rgba(55, 55, 55, 0.4)), url(<?php echo esc_url($img_background); ?>);
                                            background-position: center;
                                            background-size: cover;">
                                        <?php
                                        $url = get_field_object('destino_link');
                                        $url_valor = $url['value'];
                                        if ($url_valor == 'externo') { ?>
                                            <a href="<?php the_field('link_externo'); ?>" class="btn btn-light btn-round card-btn m-5" target="_blank" title="Saiba mais"><span class="icon pt-2 pb-2 pr-1 icon-next-icon"></span></a>
                                        <?php }
                                        if ($url_valor == 'interno') { ?>
                                            <a href="<?php the_field('link_interno'); ?>" class="btn btn-light btn-round card-btn m-5" title="Saiba mais"><span class="icon pt-2 pb-2 pr-1 icon-next-icon"></span></a>
                                        <?php }
                                        ?>

                                        <div class="card-img-overlay overlay-lg text-start">
                                            <h2 class="card-title"><?php the_field('titulo'); ?></h2>
                                            <p class="card-text"><?php the_field('descricao'); ?></p>
                                            <?php
                                            $url = get_field_object('destino_link');
                                            $url_valor = $url['value'];
                                            if ($url_valor == 'externo') { ?>
                                                <a href="<?php the_field('link_externo'); ?>" class="btn btn-primary px-5" target="_blank" title="Saiba mais">Leia
                                                    mais</a>
                                            <?php }
                                            if ($url_valor == 'interno') { ?>
                                                <a href="<?php the_field('link_interno'); ?>" class="btn btn-primary px-5" title="Saiba mais">Saiba
                                                    mais</a>
                                            <?php }
                                            ?>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        </div>

                    <?php endwhile;
                    wp_reset_postdata(); ?>

                    <?php
                    $novidades = new WP_Query(
                        array(
                            'post_type' => 'post',
                            'posts_per_page' => '4',
                        ));
                    while ($novidades->have_posts()): $novidades->the_post();
                        $capa_novidades = get_the_post_thumbnail_url(null, 'capa_498_356');
                        ?>
                        <div data-aos="fade-left" class="col-md-6">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo esc_url($capa_novidades); ?>" class="figure-img img-fluid rounded zoom-hover img-fit" alt="..."></a>
                            <a href="<?php the_permalink(); ?>"><p class="img-caption text-white mb-5">
                                    <strong><?php the_title(); ?></strong></p></a>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                    <div class="col-12">
                        <div data-aos="fade-up" class="d-flex justify-content-center">
                            <a href="<?php bloginfo('home'); ?>/novidades" class="btn btn-light px-5 btn-confira-offset">Confira
                                as
                                novidades</a>
                        </div>
                    </div>
                </div>


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
        <section class="section" id="home-projetos">
            <div class="container mb-5 pb-5">
                <div id="parallax-detalhe-2">
                    <div data-depth="0.2" class="d-flex justify-content-between">
                        <div class="trace-detail-left">
                            <img class="" src="<?php bloginfo('template_url'); ?>/img/detalhes-traco-laranja.png" alt="">
                        </div>
                        <div class="trace-detail-right">
                            <img class="" src="<?php bloginfo('template_url'); ?>/img/detalhes-traco-azul-lg.png" alt="">
                        </div>
                    </div>
                </div>


                <div class="row mt-5">
                    <?php
                    $chamadaProjetos = new WP_Query(array(
                        'pagename' => 'chamada-projetos',
                    ));
                    while ($chamadaProjetos->have_posts()): $chamadaProjetos->the_post();
                        $img_background = get_the_post_thumbnail_url(null, 'full');
                        ?>
                        <div data-aos="fade-up" class="col-md-12">
                            <div class="card card-bg-wide text-white my-5 zoom-hover card-link-div" onclick="window.location='<?php the_field('link_interno'); ?>';">
                                <div class="img-holder" style="
                                        background: linear-gradient(0deg, rgba(55, 55, 55, 0.4), rgba(55, 55, 55, 0.4)), url(<?php echo esc_url($img_background); ?>);
                                        background-position: center;
                                        background-size: cover;">
                                    <?php
                                    $url = get_field_object('destino_link');
                                    $url_valor = $url['value'];
                                    if ($url_valor == 'externo') { ?>
                                        <a href="<?php the_field('link_externo'); ?>" class="btn btn-light btn-round card-btn m-5" target="_blank" title="Saiba mais"><span class="icon pt-2 pb-2 pr-1 icon-next-icon"></span></a>
                                    <?php }
                                    if ($url_valor == 'interno') { ?>
                                        <a href="<?php the_field('link_interno'); ?>" class="btn btn-light btn-round card-btn m-5" title="Saiba mais"><span class="icon pt-2 pb-2 pr-1 icon-next-icon"></span></a>
                                    <?php }
                                    ?>

                                    <div class="card-img-overlay overlay-lg text-start">
                                        <h2 class="card-title"><?php the_field('titulo'); ?></h2>
                                        <p class="card-text"><?php the_field('descricao'); ?></p>
                                        <?php
                                        $url = get_field_object('destino_link');
                                        $url_valor = $url['value'];
                                        if ($url_valor == 'externo') { ?>
                                            <a href="<?php the_field('link_externo'); ?>" class="btn btn-primary px-5" target="_blank" title="Saiba mais">Leia
                                                mais</a>
                                        <?php }
                                        if ($url_valor == 'interno') { ?>
                                            <a href="<?php the_field('link_interno'); ?>" class="btn btn-primary px-5" title="Saiba mais">Saiba
                                                mais</a>
                                        <?php }
                                        ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>


                    <?php
                    $projetos = new WP_Query(
                        array(
                            'post_type' => 'projetos',
                            'posts_per_page' => '3',
                        ));
                    while ($projetos->have_posts()): $projetos->the_post();
                        ?>
                        <div data-aos="flip-left" class="col-md-4">

                            <div class="card card-bg-small text-white mb-2 zoom-hover card-link-div" onclick="window.location='<?php the_field('link_interno'); ?>';">
                                <div class="img-holder-sm" style="
                                        background: linear-gradient(0deg, rgba(<?php the_field('projet_cor_background'); ?>), rgba(<?php the_field('projet_cor_background'); ?>)), url(<?php the_field('projet_background'); ?>);
                                        background-position: center;
                                        background-size: cover;">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-light btn-round btn-sm card-btn m-3">
                                        <span class="icon pt-2 pb-2 pr-2 icon-next-icon"></span></a>
                                    <div class="card-img-overlay overlay-sm text-start">
                                        <a href="<?php the_permalink(); ?>">
                                            <h3 class="card-title"><?php the_field('projet_titulo'); ?></h3>
                                        </a>
                                        <a href="<?php the_permalink(); ?>">
                                            <p class="card-text"><?php the_field('projet_descricao'); ?></p>
                                        </a>
                                        <div class="overlay-status">
                                            <small class="pl-3">STATUS</small>
                                            <br>
                                            <small class="outline-text py-1 px-3 text-uppercase"><?php the_field('projet_status'); ?></small>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>


                </div>
                <div id="parallax-detalhe-3">
                    <div data-depth="0.3" class="d-flex justify-content-between">
                        <div class="trace-detail-left trace-detail-offset-bottom">
                            <img style="
                            z-index: 1;
                            position: absolute;
                            " src="<?php bloginfo('template_url'); ?>/img/detalhes-traco-laranja.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <?php
        $produtos = new WP_Query(
            array(
                'post_type' => 'produtos',
                'posts_per_page' => '6',
            )
        );
        if ($produtos->have_posts()) :
            $contador = 0;
            $count = $produtos->found_posts;
            ?>
            <!-- <section class="" id="home-produtos">
                <div class="container-fluid p-0"> -->
            <div id="carrouselProdutos" class="carousel slide section" data-ride="carousel"> <!-- carousel-fade -->
                <div class="d-none d-md-block">
                    <div class=" carousel-side-indicators-holder ">
                        <ol class="carousel-indicators"><!-- d-none d-md-block -->
                            <?php
                            for ($i = 0; $i < $count; $i++) { ?>
                                <li class="<?php if ($i == 0) echo "active"; ?> mx-3" data-target="#carrouselProdutos" data-slide-to="<?php echo $i; ?>"></li>
                            <?php }
                            ?>
                        </ol>
                    </div>
                </div>

                <div class="carousel-inner ">
                    <?php
                    while ($produtos->have_posts()): $produtos->the_post();
                        $capa_produtos = get_the_post_thumbnail_url(null, 'full');
                        $contador++
                        ?>
                        <div class="carousel-item <?php if ($contador == 1) echo "active"; ?> carousel-long "
                             style="background: linear-gradient(0deg, rgba(8, 107, 192, 0.7), rgba(8, 107, 192, 0.7)), url(<?php echo esc_url($capa_produtos); ?>);
                                     background-position: center;
                                     background-size: cover;
                                     height: 100vh;">
                            <div class="container custom-carousel-caption slider-title-center">
                                <div class="slider-title slider-title-sm">
                                    <p class="text-uppercase">Alguns produtos</p>
                                    <a href="<?php the_permalink(); ?>">
                                        <h1><?php the_title(); ?></h1>
                                    </a>
                                    <a href="<?php the_permalink(); ?>">
                                        <p class=""><?php echo get_the_excerpt(); ?></p>
                                    </a>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary px-5">Saiba mais</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
                <div class="container">
                    <div class="custom-control-carrousel-left custom-control-bottom-higher">
                        <a href="#carrouselProdutos" role="button" data-slide="prev"
                           class="btn btn-light btn-round"><span class="icon pt-2 pb-2 pl-1 icon-prev-icon"></span></a>
                        <a href="#carrouselProdutos" role="button" data-slide="next"
                           class="btn btn-light btn-round"><span class="icon pt-2 pb-2 pr-1 icon-next-icon"></span></a>
                    </div>
                </div>
            </div>
            <!-- </div>
        </section> -->
        <?php endif; ?>

        <div class="section">
            <section class="pb-0" id="home-ideias">
                <div class="container mt-4 mb-0">
                    <div id="parallax-detalhe-4">
                        <div data-depth="0.4" class="d-flex justify-content-between">
                            <div style="z-index: -2;" class="trace-detail-left trace-detail-offset-up">
                                <img class="" src="<?php bloginfo('template_url'); ?>/img/detalhes-traco-azul-lg.png" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <?php
                        $chamadaIdeia = new WP_Query(array(
                            'pagename' => 'chamada-ideias',
                        ));
                        while ($chamadaIdeia->have_posts()): $chamadaIdeia->the_post();
                            $img_background = get_the_post_thumbnail_url(null, 'full');
                            ?>
                            <div data-aos="fade-up" class="col-md-12">
                                <div class="card card-bg-wide text-white my-5 zoom-hover card-link-div" onclick="window.location='<?php the_field('link_interno'); ?>';">
                                    <div class="img-holder" style="
                                            background: linear-gradient(0deg, rgba(55, 55, 55, 0.4), rgba(55, 55, 55, 0.4)), url(<?php echo esc_url($img_background); ?>);
                                            background-position: center;
                                            background-size: cover;">
                                        <div class="card-img-overlay overlay-lg text-start">
                                            <h2 class="card-title"><?php the_field('titulo'); ?></h2>
                                            <p class="card-text"><?php the_field('descricao'); ?></p>
                                            <?php
                                            $url = get_field_object('destino_link');
                                            $url_valor = $url['value'];
                                            if ($url_valor == 'externo') { ?>
                                                <a href="<?php the_field('link_externo'); ?>" class="btn btn-primary px-5" target="_blank" title="Saiba mais">Leia
                                                    mais</a>
                                            <?php }
                                            if ($url_valor == 'interno') { ?>
                                                <a href="<?php the_field('link_interno'); ?>" class="btn btn-primary px-5" title="Saiba mais">Saiba
                                                    mais</a>
                                            <?php }
                                            ?>
                                        </div>
                                        <?php
                                        $url = get_field_object('destino_link');
                                        $url_valor = $url['value'];
                                        if ($url_valor == 'externo') { ?>
                                            <a href="<?php the_field('link_externo'); ?>" class="btn btn-light btn-round card-btn m-5" target="_blank" title="Saiba mais"><span class="icon pt-2 pb-2 pr-1 icon-next-icon"></span></a>
                                        <?php }
                                        if ($url_valor == 'interno') { ?>
                                            <a href="<?php the_field('link_interno'); ?>" class="btn btn-light btn-round card-btn m-5" title="Saiba mais"><span class="icon pt-2 pb-2 pr-1 icon-next-icon"></span></a>
                                        <?php }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>


                        <?php
                        $ideias = new WP_Query(array(
                            'post_type' => 'ideias',
                            'posts_per_page' => '3',
                        ));
                        while ($ideias->have_posts()): $ideias->the_post();
                            $foto = get_avatar_url(get_the_author_id(), array("size" => 150));

                            $statusFiled = get_field('ideia_status');
                            $votos = get_field('ideia_votos');
                            $respostas = get_comments_number(get_the_ID());
                            ?>
                            <div data-aos="zoom-in" class="col-md-4 my-3">
                                <div class="card card-full-small mb-2 zoom-hover">
                                    <div class=" overlay-white text-start">
                                        <div class="d-flex justify-content-start pb-5 mb-3">
                                            <div class="profile-pic mr-4"
                                                 style="
                                                         background-image: url(<?php echo $foto; ?>);
                                                         background-size: cover;
                                                         background-position: center;
                                                         "></div>
                                            <div>
                                                <p class="card-user-name m-0"><?php the_author_firstname(); ?>
                                                    &nbsp;<?php the_author_lastname(); ?></p>
                                                <span class="text-fade"><small>Postado em <?php echo get_the_date('d/m/Y', get_the_ID()); ?></small></span>

                                            </div>
                                        </div>
                                        <p class="text-uppercase mb-0">
                                            <small class="text-orange"><?php echo esc_html($statusFiled['label']); ?></small>
                                        </p>
                                        <a href="<?php the_permalink(); ?>">
                                            <p class="font-weight-extra-bold text-caption"><?php the_title(); ?></p>
                                        </a>
                                        <p>
                                            <small>
                                                <span class="round-outline-text py-1 px-2 mx-1"><?php echo $votos > 1 ? $votos . ' Votos' : $votos . ' Voto'; ?></span>
                                                <span class="round-outline-text py-1 px-2 mx-1"><?php echo $respostas > 1 ? $respostas . ' Respostas' : $respostas . ' Resposta'; ?></span>
                                            </small>
                                        </p>
                                        <div class="card-tags">
                                            <?php
                                            $post_tags = get_the_tags($post->id);
                                            if ($post_tags) {
                                                foreach ($post_tags as $tag) {
                                                    echo "<small class=\"orange-outline-text py-1 px-2 mr-2 my-1\">#$tag->name </small>";
                                                }
                                            }
                                            ?>
                                        </div>
                                        <!-- <img class="profile-pic float-left" height="48" src="./img/profile-1.jpg" alt=""> -->
                                    </div>
                                    <div class="overlay-white mt-auto">
                                        <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-block">Conferir
                                            ideia</a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>

                        <div class="col-12">
                            <div data-aos="zoom-in" class="d-flex justify-content-center my-5 py-5">
                                <a href="<?php bloginfo('home'); ?>/ideias" class="btn btn-primary px-5">Quero
                                    colaborar</a>
                            </div>
                        </div>
                    </div>
                    <div id="parallax-hand-1">
                        <div data-depth="0.5" class="d-flex justify-content-center mb-auto">
                            <img src="<?php bloginfo('template_url'); ?>/img/hand-all.png" alt="">
                        </div>
                    </div>
                </div>
            </section>
            <?php include "footer-nav.php"; ?>
        </div> <!-- fecha a div da sessão do footer -->
    </div> <!-- fecha a div do fullpage -->

<?php get_footer(); ?>