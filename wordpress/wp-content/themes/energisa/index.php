<?php get_header(); ?>
<?php
$args_slider = array(
    'post_type' => 'carousel',
    'posts_per_page' => '6',
);
$slider = new WP_Query($args_slider);
if ($slider->have_posts()) :
    $contador = 0;
    ?>
    <section id="home-carrousel">
        <div class="container-fluid p-0">
            <div id="carouselExampleCaptions" class="carousel slide " data-ride="carousel"> <!-- carousel-fade -->
                <div class="carousel-inner">
                    <?php
                    while ($slider->have_posts()):
                        $slider->the_post();
                        $slider_bg = get_the_post_thumbnail_url(null, 'full');
                        $contador++;
                        ?>
                        <div class="carousel-item <?php if ($contador == 1) echo "active"; ?>" style="background: linear-gradient(0deg, rgba(55, 55, 55, 0.4), rgba(55, 55, 55, 0.4)), url(<?php echo esc_url($slider_bg); ?>); background-position: center; background-size: cover;">
                            <div class="container custom-carousel-caption">
                                <div class="slider-title">
                                    <div class="text-center">
                                        <h2 class="highlight m-0"><?php the_field('titulo_1'); ?></h2> <br>
                                        <h2 class="highlight"><?php the_field('titulo_2'); ?></h2>
                                    </div>
                                    <p class="text-center"><?php the_field('tagline'); ?></p>
                                </div>
                                <div class="d-flex justify-content-between carousel-info-container text-center">
                                    <div class="carousel-info pt-5 mt-5">
                                        <h3><?php the_field('subtitulo'); ?></h3>
                                        <p><?php the_field('descricao_subtitulo'); ?></p>
                                    </div>
                                    <div class="carousel-info text-center">
                                        <img class="py-3" src="<?php bloginfo('template_url'); ?>/img/ideias-icon.png" width="100" alt="">

                                        <p class=" m-0"><strong>Compartilhamos Ideias</strong></p>
                                        <p class=""><?php the_field('texto'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="container">
                    <div class="carousel-control-holder">
                        <ol class="carousel-indicators">
                            <?php
                            for ($i = 0; $i < $contador; $i++) { ?>
                                <li data-target="#carouselExampleCaptions" data-slide-to="<?php echo $i; ?>" class="<?php if ($i == 0) echo "active"; ?>"></li>
                            <?php }
                            ?>
                        </ol>

                        <div class="custom-control-carrousel custom-control-bottom">
                            <a href="#carouselExampleCaptions" role="button" data-slide="prev"
                               class="btn btn-primary btn-round"><span class="icon pt-2 pb-2 pl-1 icon-prev-icon"></span></a>
                            <a href="#carouselExampleCaptions" role="button" data-slide="next"
                               class="btn btn-primary btn-round"><span class="icon pt-2 pb-2 pr-1 icon-next-icon"></span></a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
<?php endif; ?>


    <section class="pt-1" id="home-novidades">
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
                        <div class="card card-bg-wide text-white my-5 zoom-hover">
                            <div class="img-holder" style="
                                    background: linear-gradient(0deg, rgba(55, 55, 55, 0.4), rgba(55, 55, 55, 0.4)), url(<?php echo esc_url($img_background); ?>);
                                    background-position: center;
                                    background-size: cover;"></div>
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
                <?php endwhile;
                wp_reset_postdata(); ?>


                <div data-aos="fade-right" class="col-md-6">
                    <img src="<?php bloginfo('template_url'); ?>/img/n-small-1.png" class="figure-img img-fluid rounded zoom-hover" alt="...">
                    <p class="img-caption text-white"><strong> Ao contrário do que se acredita, Lorem Ipsum não é
                            simplesmente um texto randômico </strong></p>
                </div>
                <div data-aos="fade-left" class="col-md-6">
                    <img src="<?php bloginfo('template_url'); ?>/img/n-small-2.png" class="figure-img img-fluid rounded zoom-hover" alt="...">
                    <p class="img-caption text-white"><strong> Ao contrário do que se acredita, Lorem Ipsum não é
                            simplesmente um texto randômico</strong></p class="text-white">
                </div>
                <div data-aos="fade-right" class="col-md-6">
                    <img src="<?php bloginfo('template_url'); ?>/img/n-small-3.png" class="figure-img img-fluid rounded zoom-hover" alt="...">
                    <p class="img-caption text-white"><strong> Ao contrário do que se acredita, Lorem Ipsum não é
                            simplesmente um texto randômico</strong></p class="text-white">
                </div>
                <div data-aos="fade-left" class="col-md-6">
                    <img src="<?php bloginfo('template_url'); ?>/img/n-small-4.png" class="figure-img img-fluid rounded zoom-hover" alt="...">
                    <p class="img-caption text-white"><strong> Ao contrário do que se acredita, Lorem Ipsum não é
                            simplesmente um texto randômico</strong></p class="text-white">
                </div>
                <div class="col-12">
                    <div data-aos="fade-up" class="d-flex justify-content-center">
                        <button class="btn btn-light px-5">Confira as novidades</button>
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
    <section id="home-projetos">
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
                        <div class="card card-bg-wide text-white my-5 zoom-hover">
                            <div class="img-holder" style="
                                    background: linear-gradient(0deg, rgba(55, 55, 55, 0.4), rgba(55, 55, 55, 0.4)), url(<?php echo esc_url($img_background); ?>);
                                    background-position: center;
                                    background-size: cover;"></div>
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
                <?php endwhile;
                wp_reset_postdata(); ?>


                <div data-aos="flip-left" class="col-md-4">
                    <div class="card card-bg-small text-white mb-2 zoom-hover">
                        <!-- <img src="https://via.placeholder.com/1920x600" class="card-img" alt="..."> -->
                        <div class="img-holder-sm" style="
                                background: linear-gradient(0deg, rgba(205,87,27, 0.6), rgba(205,87,27, 0.6)), url(<?php bloginfo('template_url'); ?>/img/projetos-1.png);
                                background-position: center;
                                background-size: cover;"></div>
                        <div class="card-img-overlay overlay-sm text-start">
                            <h3 class="card-title">Negociação de Dívidas</h3>
                            <p class="card-text">A vantagem de usar Lorem Ipsum é que ele tem uma distribuição normal de
                                letras, ao contrário de "Conteúdo aqui, conteúdo aqui".</p>
                            <div class="overlay-status">
                                <small class="pl-3 ">STATUS</small>
                                <br>
                                <small class="outline-text py-1 px-3">FINALIZADO</small>
                            </div>
                        </div>
                        <button class="btn btn-light btn-round btn-sm card-btn m-3">
                            <span class="icon pt-2 pb-2 pr-2 icon-next-icon"></span></button>
                    </div>
                </div>
                <div data-aos="flip-left" class="col-md-4">
                    <div class="card card-bg-small text-white mb-2 zoom-hover">
                        <!-- <img src="https://via.placeholder.com/1920x600" class="card-img" alt="..."> -->
                        <div class="img-holder-sm" style="
                                background: linear-gradient(0deg, rgba(141,99,34, 0.6), rgba(141,99,34, 0.6)), url(<?php bloginfo('template_url'); ?>/img/projetos-2.png);
                                background-position: center;
                                background-size: cover;"></div>
                        <div class="card-img-overlay overlay-sm text-start">
                            <h3 class="card-title">Negociação de Dívidas</h3>
                            <p class="card-text">A vantagem de usar Lorem Ipsum é que ele tem uma distribuição normal de
                                letras, ao contrário de "Conteúdo aqui, conteúdo aqui".</p>
                            <div class="overlay-status">
                                <small class="pl-3 ">STATUS</small>
                                <br>
                                <small class="outline-text py-1 px-3">FINALIZADO</small>
                            </div>
                        </div>
                        <button class="btn btn-light btn-round btn-sm card-btn m-3">
                            <span class="icon pt-2 pb-2 pr-2 icon-next-icon"></span></button>
                    </div>
                </div>
                <div data-aos="flip-left" class="col-md-4">
                    <div class="card card-bg-small text-white mb-2 zoom-hover">
                        <!-- <img src="https://via.placeholder.com/1920x600" class="card-img" alt="..."> -->
                        <div class="img-holder-sm" style="
                                background: linear-gradient(0deg, rgba(44,85,138, 0.6), rgba(44,85,138, 0.6)), url(<?php bloginfo('template_url'); ?>/img/projetos-3.png);
                                background-position: center;
                                background-size: cover;"></div>
                        <div class="card-img-overlay overlay-sm text-start">
                            <h3 class="card-title">Negociação de Dívidas</h3>
                            <p class="card-text">A vantagem de usar Lorem Ipsum é que ele tem uma distribuição normal de
                                letras, ao contrário de "Conteúdo aqui, conteúdo aqui".</p>
                            <div class="overlay-status">
                                <small class="pl-3 ">STATUS</small>
                                <br>
                                <small class="outline-text py-1 px-3">FINALIZADO</small>
                            </div>
                        </div>
                        <button class="btn btn-light btn-round btn-sm card-btn m-3">
                            <span class="icon pt-2 pb-2 pr-2 icon-next-icon"></span></button>
                    </div>
                </div>

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
    <section id="home-produtos">
        <div class="container-fluid p-0">
            <div id="carrouselProdutos" class="carousel slide" data-ride="carousel"> <!-- carousel-fade -->
                <div class="carousel-side-indicators-holder">
                    <ol class="carousel-indicators">
                        <li class="active mx-3" data-target="#carrouselProdutos" data-slide-to="0"></li>
                        <li class="mx-3" data-target="#carrouselProdutos" data-slide-to="1"></li>
                        <li class="mx-3" data-target="#carrouselProdutos" data-slide-to="2"></li>
                    </ol>
                </div>

                <div class="carousel-inner ">
                    <div class="carousel-item active carousel-long zoom-hover"
                         style="
                                 background: linear-gradient(0deg, rgba(8, 107, 192, 0.7), rgba(8, 107, 192, 0.7)), url(<?php bloginfo('template_url'); ?>/img/projeto-autoatendimento.png);
                                 background-position: center;
                                 background-size: cover;">
                        <!-- <img src="https://via.placeholder.com/1442x854" class="d-block w-100" alt="..."> -->

                        <div class="container custom-carousel-caption">
                            <div class="slider-title slider-title-sm">
                                <p class="text-uppercase">Alguns produtos</p>
                                <h1>Totem Autoatendimento</h1>
                                <p class="">É um fato conhecido de todos que um leitor se distrairá com o conteúdo de
                                    texto legível de uma página quando estiver examinando sua diagramação</p>
                                <button class="btn btn-primary px-5">Saiba mais</button>

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item  carousel-long zoom-hover"
                         style="
                                 background: linear-gradient(0deg, rgba(8, 107, 192, 0.7), rgba(8, 107, 192, 0.7)), url(<?php bloginfo('template_url'); ?>/img/projeto-autoatendimento.png);
                                 background-position: center;
                                 background-size: cover;">
                        <!-- <img src="https://via.placeholder.com/1442x854" class="d-block w-100" alt="..."> -->

                        <div class="container custom-carousel-caption">
                            <div class="slider-title slider-title-sm">
                                <p class="text-uppercase">Alguns produtos</p>
                                <h1>Totem Autoatendimento</h1>
                                <p class="">É um fato conhecido de todos que um leitor se distrairá com o conteúdo de
                                    texto legível de uma página quando estiver examinando sua diagramação</p>
                                <button class="btn btn-primary px-5">Saiba mais</button>

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item  carousel-long zoom-hover"
                         style="
                                 background: linear-gradient(0deg, rgba(8, 107, 192, 0.7), rgba(8, 107, 192, 0.7)), url(<?php bloginfo('template_url'); ?>/img/projeto-autoatendimento.png);
                                 background-position: center;
                                 background-size: cover;">
                        <!-- <img src="https://via.placeholder.com/1442x854" class="d-block w-100" alt="..."> -->

                        <div class="container custom-carousel-caption">
                            <div class="slider-title slider-title-sm">
                                <p class="text-uppercase">Alguns produtos</p>
                                <h1>Totem Autoatendimento</h1>
                                <p class="">É um fato conhecido de todos que um leitor se distrairá com o conteúdo de
                                    texto legível de uma página quando estiver examinando sua diagramação</p>
                                <button class="btn btn-primary px-5">Saiba mais</button>

                            </div>
                        </div>
                    </div>

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
        </div>

    </section>
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
                        <div class="card card-bg-wide text-white my-5 zoom-hover">
                            <div class="img-holder" style="
                                    background: linear-gradient(0deg, rgba(55, 55, 55, 0.4), rgba(55, 55, 55, 0.4)), url(<?php echo esc_url($img_background); ?>);
                                    background-position: center;
                                    background-size: cover;"></div>
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
                <?php endwhile;
                wp_reset_postdata(); ?>

                <div data-aos="zoom-in" class="col-md-4">
                    <div class="card card-full-small mb-2 zoom-hover">
                        <div class=" overlay-white text-start">
                            <div class="d-flex justify-content-start pb-4">
                                <div class="profile-pic mr-4"
                                     style="
                                             background-image: url(<?php bloginfo('template_url'); ?>/img/profile-1.jpg);
                                             background-size: cover;
                                             background-position: center;
                                             "></div>
                                <div>
                                    <p class="card-user-name m-0">Francisco José Vieira Martins</p>
                                    <span class="text-fade"><small>Postado 10/12/2019</small></span>

                                </div>
                            </div>
                            <p class="text-uppercase">
                                <small class="text-orange">em votação</small>
                            </p>
                            <p class="font-weight-extra-bold text-caption">Nova função para verificar histórico</p>
                            <p>
                                <small>
                                    <span class="round-outline-text py-1 px-2 mx-1">14 Votos</span>
                                    <span class="round-outline-text py-1 px-2 mx-1">3 Respostas</span>
                                </small>
                            </p>
                            <div class="card-tags">
                                <small class="orange-outline-text py-1 px-2 mr-2 my-1">#conta</small>
                                <small class="orange-outline-text py-1 px-2 mr-2 my-1">#app</small>
                                <small class="orange-outline-text py-1 px-2 mr-2 my-1">#funcao</small>
                            </div>
                            <!-- <img class="profile-pic float-left" height="48" src="./img/profile-1.jpg" alt=""> -->
                        </div>
                        <div class="overlay-white mt-auto">
                            <button class="btn btn-primary btn-block">Conferir ideia</button>
                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in" class="col-md-4">
                    <div class="card card-full-small mb-2 zoom-hover">
                        <div class=" overlay-white text-start">
                            <div class="d-flex justify-content-start pb-4">
                                <div class="profile-pic mr-4"
                                     style="
                                             background-image: url(<?php bloginfo('template_url'); ?>/img/profile-1.jpg);
                                             background-size: cover;
                                             background-position: center;
                                             "></div>
                                <div>
                                    <p class="card-user-name m-0">Patrícia Fuentes</p>
                                    <span class="text-fade"><small>Postado 10/12/2019</small></span>

                                </div>
                            </div>
                            <p class="text-uppercase">
                                <small class="text-orange">em votação</small>
                            </p>
                            <p class="font-weight-extra-bold text-caption">Como lidar com times remotos</p>
                            <p>
                                <small>
                                    <span class="round-outline-text py-1 px-2 mx-1">112 Votos</span>
                                    <span class="round-outline-text py-1 px-2 mx-1">43 Respostas</span>
                                </small>
                            </p>
                            <div class="card-tags">
                                <small class="orange-outline-text py-1 px-2 mr-2 my-1">#conta</small>
                                <small class="orange-outline-text py-1 px-2 mr-2 my-1">#app</small>
                                <small class="orange-outline-text py-1 px-2 mr-2 my-1">#funcao</small>
                            </div>
                            <!-- <img class="profile-pic float-left" height="48" src="./img/profile-1.jpg" alt=""> -->
                        </div>
                        <div class="overlay-white mt-auto">
                            <button class="btn btn-primary btn-block">Conferir ideia</button>
                        </div>

                    </div>
                </div>
                <div data-aos="zoom-in" class="col-md-4">
                    <div class="card card-full-small mb-2 zoom-hover">
                        <div class=" overlay-white text-start">
                            <div class="d-flex justify-content-start pb-4">
                                <div class="profile-pic mr-4"
                                     style="
                                             background-image: url(<?php bloginfo('template_url'); ?>/img/profile-1.jpg);
                                             background-size: cover;
                                             background-position: center;
                                             "></div>
                                <div>
                                    <p class="card-user-name m-0">Gleyse Souza e Silva</p>
                                    <span class="text-fade"><small>Postado 10/12/2019</small></span>

                                </div>
                            </div>
                            <p class="text-uppercase">
                                <small class="text-orange">em votação</small>
                            </p>
                            <p class="font-weight-extra-bold text-caption">Novos cabos em fibra podem alterar
                                velocidade</p>
                            <p>
                                <small>
                                    <span class="round-outline-text py-1 px-2 mx-1">18 Votos</span>
                                    <span class="round-outline-text py-1 px-2 mx-1">8 Respostas</span>
                                </small>
                            </p>
                            <div class="card-tags">
                                <small class="orange-outline-text py-1 px-2 mr-2 my-1">#conta</small>
                                <small class="orange-outline-text py-1 px-2 mr-2 my-1">#app</small>
                                <small class="orange-outline-text py-1 px-2 mr-2 my-1">#funcao</small>
                            </div>
                            <!-- <img class="profile-pic float-left" height="48" src="./img/profile-1.jpg" alt=""> -->
                        </div>
                        <div class="overlay-white mt-auto">
                            <button class="btn btn-primary btn-block">Conferir ideia</button>
                        </div>

                    </div>
                </div>
                <div class="col-12">
                    <div data-aos="zoom-in" class="d-flex justify-content-center my-5 py-5">
                        <button class="btn btn-primary px-5">Confira as novidades</button>
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
<?php get_footer(); ?>