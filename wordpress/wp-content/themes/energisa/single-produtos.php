<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
    <?php $img_background = get_the_post_thumbnail_url(null, 'full'); ?>
    <section id="product-banner">
        <div style="
                background: linear-gradient(0deg, rgba(8, 155, 192, 0.7), rgba(8, 155, 192, 0.7)), url(<?php echo esc_url($img_background); ?>);
                background-size: cover;
                background-position: center;
                background-blend-mode: multiply, normal;
                " class="container-fluid   product-banner-holder px-0 ">
            <!-- text-white -->
            <div class="product-banner text-center text-white ">
                <h1><?php the_title(); ?></h1>
                <p class="text-caption"><?php echo get_the_excerpt(); ?></p>
            </div>
        </div>
    </section>

    <?php if (have_rows('flexible_content')): ?>
        <?php while (have_rows('flexible_content')): the_row(); ?>

            <!-- Verifica se existe o layout Informações do Produto-->
            <?php if (get_row_layout() == 'layout_prod_info'): ?>
                <section id="product-description">
                    <div class="container-fluid p-0">
                        <div class="row  py-5 mr-2">
                            <div class="col-md-6">
                                <div style="height: 100%;
                                        background-image: url(<?php echo get_sub_field('prod_imagem_desc'); ?>);
                                        background-size: cover;
                                        background-position: center;
                                        " class="product-description-info">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product-description-text pl-3">

                                    <!-- Verifica se tem algum valor cadastrado no campo repetidor-->
                                    <?php while (have_rows('prod_informacoes')): the_row();
                                        $texto = get_sub_field('prod_indicador_texto');
                                        $porcentagem = get_sub_field('prod_indicador_valor');
                                        ?>
                                        <h2 data-aos="fade-up" class="display-h2">
                                            <?php echo get_sub_field('prod_desc_titulo'); ?>
                                        </h2>
                                        <p data-aos="fade-up"><?php echo get_sub_field('prod_desc_descricao'); ?></p>
                                    <?php endwhile; ?>

                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <!-- Verifica se existe o layout Linha do Tempo-->
            <?php if (get_row_layout() == 'layout_linha_tempo'): ?>
                <section id="product-timeline">
                    <div data-aos="fade-up" class="container pt-5">
                        <div id="parallax-detalhe-1">
                            <div data-depth="0.2" class="d-flex justify-content-between">
                                <div class="trace-detail-left trace-detail-offset-up">
                                    <img class="" src="<?php bloginfo('template_url'); ?>/img/detalhes-traco-azul.png" alt="">
                                </div>
                                <div class="trace-detail-right ">
                                </div>
                            </div>
                        </div>
                        <h1 class="text-orange py-5">Linha do tempo do projeto</h1>
                        <p class="text-gray">Acompanhe através da nossa linha do tempo as principais etapas deste
                            projeto e
                            veja o
                            seu desenvolvimento</p>
                    </div>
                    <div class="container-fluid p-0">
                        <div class="timeline">
                            <ol>
                                <!-- Verifica se tem algum valor cadastrado no campo repetidor-->
                                <?php if (have_rows('prod_linha_temporal')): while (have_rows('prod_linha_temporal')): the_row();
                                    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                                    date_default_timezone_set('America/Sao_Paulo');
                                    $date_string = get_sub_field('prod_data_tempo');

                                    $field = get_sub_field('prod_link_tempo');
                                    $destinoUrl = esc_html($field['value']);
                                    ?>
                                    <li>
                                        <div>
                                            <p class="text-gray text-uppercase"><?php echo strftime('%d de %b %Y', strtotime($date_string)); ?> </p>
                                            <p class="text-caption font-weight-bold text-blue"><?php echo get_sub_field('prod_titulo_tempo'); ?></p>
                                            <p class="text-gray">
                                                <small><?php echo get_sub_field('prod_desc_tempo'); ?></small>
                                            </p>
                                            <?php if ($destinoUrl != 'none'): ?>
                                                <?php if ($destinoUrl == 'interno'): ?>
                                                    <a href="<?php echo get_sub_field('prod_linkinterno_tempo'); ?>" class="btn btn-outline-light px-5">
                                                        fotos do produto</a>
                                                <?php endif; ?>
                                                <?php if ($destinoUrl == 'externo'): ?>
                                                    <a href="<?php echo get_sub_field('prod_linkexterno_tempo'); ?>" target="_blank" class="btn btn-outline-light px-5">
                                                        acesse nosso
                                                        site</a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                                <?php endif; ?>
                                <li></li>
                            </ol>
                            <div class="arrows">
                                <p class="mt-3">Navegue horizontalmente</p>
                                <button class="btn arrow arrow__prev disabled"><i class="fas fa-chevron-left"></i>
                                </button>
                                <button class="btn arrow arrow__next"><i class="fas fa-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <!-- Verifica se existe o layout Carousel-->
            <?php if (get_row_layout() == 'layout_prod_carousel'): ?>
                <!-- Verifica se tem algum valor cadastrado no campo repetidor-->
                <?php if (have_rows('prod_carousel_repeat')): ?>
                    <section id="slider-long">
                        <div class="container">
                            <div id="parallax-detalhe-2">
                                <div data-depth="0.2" class="d-flex justify-content-between">
                                    <div class="trace-detail-left ">
                                    </div>
                                    <div class="trace-detail-right trace-detail-offset-up">
                                        <img class="" src="<?php bloginfo('template_url'); ?>/img/detalhes-traco-laranja.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid p-0">
                            <div id="carrouselProdutosBlue" class="carousel slide" data-ride="carousel">
                                <!-- carousel-fade -->
                                <div class="carousel-inner ">
                                    <?php $slidersCount = 0; ?>
                                    <?php while (have_rows('prod_carousel_repeat')): the_row();
                                        $slidersCount++;
                                        ?>
                                        <div class="carousel-item <?php if ($slidersCount == 1) echo "active"; ?> carousel-long zoom-hover">
                                            <div class="container custom-carousel-caption">
                                                <div class="slider-title ">
                                                    <div class="text-center mb-5 mx-5">
                                                        <h2 class="display-h2 ">Olha o que vem por aí</h2>
                                                        <p>Estamos cada vez mais empolgados para melhorar nossos
                                                            serviços,
                                                            acompanhe em que
                                                            estamos trabalhando atualmente</p>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div style="
                                                                    height: 431px;
                                                                    background-image: url(<?php the_sub_field('prod_carousel_img'); ?>);
                                                                    background-size: cover;
                                                                    background-position: center;
                                                                    " class="product-description-info">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="text-uppercase"><?php the_sub_field('prod_carousel_tagline'); ?></p>
                                                            <h2 style="width: 300px;" class="display-h2 "><?php the_sub_field('prod_carousel_titulo'); ?></h2>
                                                            <p class=""><?php the_sub_field('prod_carousel_descricao'); ?></p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                                <div class="container">
                                    <div class="custom-control-carrousel-center custom-control-bottom">
                                        <a href="#carrouselProdutosBlue" role="button" data-slide="prev"
                                           class="btn btn-light btn-round"><span class="icon pt-2 pb-2 pl-1 icon-prev-icon"></span></a>
                                        <a href="#carrouselProdutosBlue" role="button" data-slide="next"
                                           class="btn btn-light btn-round"><span class="icon pt-2 pb-2 pr-1 icon-next-icon"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
            <?php endif; ?>

            <!-- Verifica se existe o layout Indicadores-->
            <?php if (get_row_layout() == 'layout_prod_indicadores'): ?>
                <!-- Verifica se tem algum valor cadastrado no campo repetidor-->
                <?php if (have_rows('prod_indicadores')): ?>
                    <section id="indicadores">
                        <div class="container text-center my-5">
                            <h2 data-aos="fade-up" class="display-h2 text-orange">Conheça nossos
                                indicadores</h2>
                            <p data-aos="fade-up">Fique por dentro e acompanhe cada momento da nossa jornada</p>
                            <div data-aos="flip-down" class="row">
                                <?php $linhas = 0; ?>
                                <?php while (have_rows('prod_indicadores')): the_row();
                                    $texto = get_sub_field('prod_indicador_texto');
                                    $porcentagem = get_sub_field('prod_indicador_valor');
                                    $linhas++;
                                    ?>
                                    <div class="col-md-4">
                                        <div id="progress-<?php echo $linhas; ?>"></div>
                                        <div class="graph-detail-holder">

                                            <h3 class="font-weight-bold"><?php echo $porcentagem; ?>%</h3>
                                            <p class="text-gray"><?php echo $texto; ?></p>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
            <?php endif; ?>

            <!-- Verifica se existe o layout Últimas Novidades-->
            <?php if (get_row_layout() == 'layout_prod_novidades'):

                $categoriaObj = get_sub_field('prod_novidades_category');
                $categoria_slug = esc_html($categoriaObj->slug);

                $ultimas_novidades = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => '3',
                    'category_name' => $categoria_slug
                ));

                if ($ultimas_novidades->have_posts()): ?>
                    <section class="text-center mt-5 pb-0" id="ultimas-noticias">
                        <div class="container">
                            <div data-aos="flip-up" class="ultimas-novidades-title">
                                <img src="<?php bloginfo('template_url'); ?>/img/paper.png" alt="">
                                <h2 class="display-h2 text-orange">Últimas novidades</h2>
                                <p>Encontre abaixo nossas últimas postagens e fique por dentro do que anda acontecendo
                                    no nosso setor,
                                    fique bem
                                    informado</p>
                            </div>
                            <div id="parallax-detalhe-3">
                                <div data-depth="0.2" class="d-flex justify-content-between">
                                    <div class="trace-detail-left trace-detail-offset-up">
                                        <img class="" src="<?php bloginfo('template_url'); ?>/img/detalhes-pontos-laranja.png" alt="">
                                    </div>
                                    <div class="trace-detail-right">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <?php
                                while ($ultimas_novidades->have_posts()): $ultimas_novidades->the_post();
                                    $capa_novidades = get_the_post_thumbnail_url(null, 'capa_380_255');
                                    ?>
                                    <div data-aos="fade-right" class="col-md-4">
                                        <img src="<?php echo esc_url($capa_novidades); ?>" class="figure-img img-fluid rounded zoom-hover" alt="...">
                                        <p class="img-caption  text-uppercase">
                                            <small>postado em
                                                <strong><?php echo get_the_time(__('j \d\e M  Y'), $post->id); ?></strong>
                                            </small>
                                        </p>
                                        <p class="font-weight-bold"><?php the_title(); ?></p>
                                        <p class="font-weight-light"><?php echo get_the_excerpt(); ?></p>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata(); ?>
                                <div class="col-md-12">
                                    <div data-aos="zoom-in" class="d-flex justify-content-center py-5">
                                        <a href="<?php bloginfo('home'); ?>/novidades" class="btn btn-primary px-5">Confira as novidades</a>
                                    </div>

                                </div>
                            </div>
                            <div id="parallax-bush-1">
                                <div data-depth="0.1" class="d-flex justify-content-between">
                                    <div>
                                        <img style="transform: scaleX(-1)" src="<?php bloginfo('template_url'); ?>/img/bush-md.png" alt="">
                                    </div>
                                    <div>
                                        <img style="margin-top: 96px; transform: scaleX(-1)" src="<?php bloginfo('template_url'); ?>/img/bush-sm.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
            <?php endif; ?>


        <?php endwhile; ?>
    <?php endif; ?>


<?php endwhile; ?>

<?php get_footer(); ?>