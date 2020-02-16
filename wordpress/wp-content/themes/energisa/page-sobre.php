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
                    <p style="max-width: 450px;" class="text-caption text-dark"><?php the_field('sobre_proposito_text'); ?></p>
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

                                    <!-- Verifica se tem algum valor cadastrado no campo repetidor-->
                                    <?php $count = 0; ?>
                                    <?php while (have_rows('sobre_equipe_repeat')): the_row();
                                        ?>
                                        <div class="col-md-3 text-center">
                                            <a href="#" data-toggle="modal" data-target="#equipeModal-<?php echo $count; ?>">
                                                <div style=" background-image: url(<?php the_sub_field('sobre_equipe_foto'); ?>); max-width:100%;" class="team-img-holder m-auto">
                                                </div>
                                            </a>
                                            <p class="font-weight-bold text-blue m-0"><?php the_sub_field('sobre_equipe_nome'); ?></p>
                                            <p><?php the_sub_field('sobre_equipe_cargo'); ?></p>
                                        </div>
                                        <?php $count++; ?>
                                    <?php endwhile; ?>
                                    
                                </div>
                                <!--.row-->
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
    <div class="modal fade" id="equipeModal-0" tabindex="-1" role="dialog" aria-labelledby="equipeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div style="background-image: linear-gradient(0deg, rgba(67, 67, 67, 0.6), rgba(67, 67, 67, 0.6)), url(<?php bloginfo('template_url'); ?>/img/member-pic.png);" class="modal-header d-flex justify-content-end bg-header">

                    <button type="button" class="btn btn-light btn-round py-1" data-dismiss="modal" aria-label="Close">
                        <span class="text-gray" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-5 m-4">
                    <div class="text-start my-2">
                        <h3 class=" font-weight-bold">Bio</h3>
                        <p class=" font-weight-light text-caption">Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Sagittis, sit
                            facilisi consequat tortor ullamcorper lacus, ullamcorper nisi ut. Eros, massa viverra ornare
                            mi,
                            donec. Senectus mauris hendrerit quam urna enim odio porttitor dui. Sit felis cras
                            adipiscing
                            aliquet. Feugiat ornare fames lacus purus. Viverra sit gravida malesuada lectus fermentum
                            placerat. Eu faucibus in amet, nec, gravida luctus neque proin aliquam. Neque id est at
                            consequat nunc, sed. Lorem non bibendum iaculis felis, suspendisse. Tempus odio purus, amet
                            sit.
                            Phasellus sed ornare nisl vivamus ultricies in eu, convallis integer.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>

    <section id="o-que-fazemos">
        <div data-aos="fade-up" class="container py-5 my-5">
            <h1 class="font-weight-bold text-orange">Um pouco <br> do que fizemos</h1>
            <p style="max-width: 560px;">Acompanhe um pouco do que aconteceu recentemente por aqui, veja produtos,
                eventos, treinamentos e afins</p>


        </div>
        <div data-aos="fade-up" class="container-fluid p-0">
            <div class="card-slider">
                <div class="card card-sm card-bg-small text-white mb-2 ">
                    <!-- <img src="https://via.placeholder.com/1920x600" class="card-img" alt="..."> -->
                    <div class="img-holder-sm" style="
                            background: linear-gradient(0deg, rgba(67, 67, 67, 0.6), rgba(67, 67, 67, 0.6)), url(<?php bloginfo('template_url'); ?>/img/projeto-autoatendimento.png);
                            background-blend-mode: multiply, normal;
                            background-position: center;
                            background-size: cover;"></div>
                    <div class="card-img-overlay overlay-xs text-start">
                        <p class="text-caption-lg font-weight-bold card-title-sm">Totem de autoatendimento</p>
                        <div class="overlay-status card-sub-sm">
                            <small class="outline-text text-uppercase py-1 px-3">Protudo</small>
                        </div>
                    </div>
                    <button class="btn btn-light btn-round btn-sm card-btn m-3" data-toggle="modal" data-target="#OQueFazemosModal">
                        <span class="icon pr-1 pt-1 icon-next-icon"></span></button>
                </div>


            </div>
            <div class="d-flex justify-content-center">
                <p class="mt-3">Navegue horizontalmente</p>
                <button class="btn arrow arrow__prev disabled"><i class="fas fa-chevron-left"></i></button>
                <button class="btn arrow arrow__next"><i class="fas fa-chevron-right"></i></button>
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

    <!-- Modal -->
    <div class="modal fade" id="OQueFazemosModal" tabindex="-1" role="dialog" aria-labelledby="OQueFazemosModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div style="background-image: linear-gradient(0deg, rgba(67, 67, 67, 0.6), rgba(67, 67, 67, 0.6)), url(<?php bloginfo('template_url'); ?>/img/modal-quem-somos.png);" class=" p-4  bg-header">
                    <button type="button" class="btn btn-light btn-round py-1 float-right" data-dismiss="modal" aria-label="Close">
                        <span class="text-gray" aria-hidden="true">&times;</span>
                    </button>
                    <h2 style="max-width: 590px;" class="text-white font-weight-bold mx-5 mt-5">Meetup Usabilidade
                        Móvel</h2>
                    <p class="text-uppercase ml-5">
                        <small class="font-weight-bold modal-tag py-1 px-3">treinamento</small>
                    </p>

                </div>
                <div class="modal-body p-5 m-4">
                    <div class="text-start my-2">
                        <h3 class=" font-weight-bold mb-5">Confira como foi</h3>
                        <p class=" font-weight-light text-caption">Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Sagittis, sit
                            facilisi consequat tortor ullamcorper lacus, ullamcorper nisi ut. Eros, massa viverra ornare
                            mi,
                            donec. Senectus mauris hendrerit quam urna enim odio porttitor dui. Sit felis cras
                            adipiscing
                            aliquet. Feugiat ornare fames lacus purus. Viverra sit gravida malesuada lectus fermentum
                            placerat. Eu faucibus in amet, nec, gravida luctus neque proin aliquam. Neque id est at
                            consequat nunc, sed. Lorem non bibendum iaculis felis, suspendisse. Tempus odio purus, amet
                            sit.
                            Phasellus sed ornare nisl vivamus ultricies in eu, convallis integer.</p>
                        <p class=" font-weight-light text-caption">Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Sagittis, sit
                            facilisi consequat tortor ullamcorper lacus, ullamcorper nisi ut. Eros, massa viverra ornare
                            mi,
                            donec. Senectus mauris hendrerit quam urna enim odio porttitor dui. Sit felis cras
                            adipiscing
                            aliquet. Feugiat ornare fames lacus purus. Viverra sit gravida malesuada lectus fermentum
                            placerat. Eu faucibus in amet, nec, gravida luctus neque proin aliquam. Neque id est at
                            consequat nunc, sed. Lorem non bibendum iaculis felis, suspendisse. Tempus odio purus, amet
                            sit.
                            Phasellus sed ornare nisl vivamus ultricies in eu, convallis integer.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>

<?php endwhile; ?>
<?php get_footer(); ?>
