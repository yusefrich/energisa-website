<?php get_header(); ?>
    <div id="fullpage">
        <?php $countCarousel = 0; ?>
        <?php while (have_posts()) :
            the_post(); ?>
            <?php $img_background = get_the_post_thumbnail_url(null, 'full'); ?>
            <?php
            //Pega o código rgba do card
            $campo_card_rgba = explode(',', get_field('prod_cor_background'));
            // Transforma a string em um array
            $card_rgba = "$campo_card_rgba[0],$campo_card_rgba[1],$campo_card_rgba[2],1";
            ?>
            <section class="section" id="product-banner">
                <div style="
                        background-image: url(<?php echo esc_url($img_background); ?>);
                        background-size: cover;
                        background-position: center;
                        height: 100vh;
                        background-blend-mode: multiply, normal;
                        " class="container-fluid   product-banner-holder px-0 ">
                    <!-- text-white -->
                    <div class="product-banner slider-title-center text-center text-white ">
                        <h1><?php the_title(); ?></h1>
                        <p style="line-height: 42px;" class="text-caption"><?php echo get_the_excerpt(); ?></p>
                    </div>
                </div>
            </section>

            <?php
            $post->ID;
            $flex_field_array = get_post_meta($post->ID, 'flexible_content', true);
            $flexible_content_count = 0;
            if (is_array($flex_field_array)) {
                $flexible_content_count = count($flex_field_array);
            }
            ?>
            <?php if (have_rows('flexible_content')): ?>
            <?php $layout_count = 0; ?>
            <?php while (have_rows('flexible_content')):
                the_row(); ?>
                <?php $layout_count++; ?>

                <?php if (get_row_layout() == 'layout_prod_releases'): ?>
                <?php
                $fundo_bg = "";
                switch (get_sub_field('prod_releases_background')) {
                    case 'branco':
                        $fundo_bg = "bg-white";
                        break;
                    case 'cinza':
                        $fundo_bg = "bg-gray";
                        break;
                    case 'azul':
                        $fundo_bg = "bg-blue";
                        break;
                }
                ?>
                <section id="releases-todos" class="section <?php echo $fundo_bg; ?>">
                    <div class="container">
                        <div  style="margin-top: 100px" class="text-center mb-5">
                            <h2 class="text-orange display-h2"><?php the_sub_field('prod_releases_secTitle') ?></h2>
                            <p style="max-width: 640px;" class="text-gray m-auto"><?php the_sub_field('prod_releases_secDesc') ?></p>
                        </div>
                    </div>
                    <div class="container-fluid  p-0">
                        <section class="release release-single">
                            <ul>
                                <li  style="margin-top: 70px"></li>
                                <?php $releaseCount = 0; ?>
                                <?php while (have_rows('prod_releases_repeat')): the_row();
                                    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                                    date_default_timezone_set('America/Sao_Paulo');
                                    $date_string = get_sub_field('prod_release_date');

                                    $destinoUrl = get_sub_field('prod_link_release');
                                    $releaseCount++;
                                    ?>
                                    <li>
                                        <div class="<?php echo $releaseCount === 1 ? "text-right" : ""; ?>">
                                            <?php if ($releaseCount === 1) : ?>
                                                <p style="background: rgba(<?php echo $card_rgba; ?>); max-width: 220px" class="paragraph text-white font-weight-bold tittle-badge"><?php the_title(); ?></p>
                                                <br>
                                            <?php endif; ?>
                                            <time><?php echo date_i18n('j \d\e M  Y', strtotime($date_string)) ?></time>
                                            <p style="max-width: 230px" class="paragraph-text-small font-weight-bold"><?php the_sub_field('prod_release_title'); ?></p>
                                            <p style="max-width: 234px" class="release-text text-gray-2"><?php the_sub_field('prod_release_desc'); ?>
                                                <?php if ($destinoUrl != 'none'): ?>
                                                    <?php if ($destinoUrl == 'interno'): ?>
                                                        <br>
                                                        <a style="padding: 7px 37px;" href="<?php echo get_sub_field('prod_linkinterno_release'); ?>" class="btn btn-outline-light px-5 font-weight-600 release-btn">
                                                            Acesse nosso site
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if ($destinoUrl == 'externo'): ?>
                                                        <br>
                                                        <a style="padding: 7px 37px;" href="<?php echo get_sub_field('prod_linkexterno_release'); ?>" target="_blank" class="btn btn-outline-light px-5 font-weight-600 release-btn">
                                                            Acesse nosso site
                                                        </a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                            <div data-aos="zoom-in" class="d-flex justify-content-center py-5">
                                <button style="padding-left: 22px !important; padding-right: 22px !important;" class="btn btn-primary px-5">
                                    Exibir mais releases
                                </button>
                            </div>
                        </section>
                    </div>
                    <?php
                    if ($flexible_content_count === $layout_count): ?>
                        <?php include "footer-nav.php"; ?>
                    <?php endif; ?>
                </section>

            <?php endif; ?>

                <?php if (get_row_layout() == 'layout_prod_info'): ?>
                <?php
                $fundo_bg = "";
                $detail_bg = "";
                switch (get_sub_field('prod_info_background')) {
                    case 'branco':
                        $fundo_bg = "bg-white";
                        $detail_bg = "normal-detail-bg";
                        break;
                    case 'cinza':
                        $fundo_bg = "bg-gray";
                        $detail_bg = "normal-detail-bg";
                        break;
                    case 'azul':
                        $fundo_bg = "bg-blue";
                        $detail_bg = "custom-detail-bg";
                        break;
                }
                ?>
                <section class="section <?php echo $fundo_bg; ?>">
                    <div style="min-height: 700px" class="container-fluid p-0 mt-5">
                        <div s class="row py-5 mr-2">
                            <div class="col-md-6 pr-md-5 ">
                                <div style="height: 100%;
                                        background-image: url(<?php echo get_sub_field('prod_imagem_desc'); ?>);
                                        background-size: cover;
                                        background-position: center;
                                        " class="product-description-info mr-md-2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product-description-text pl-3 <?php echo $detail_bg; ?>">

                                    <!-- Verifica se tem algum valor cadastrado no campo repetidor-->
                                    <?php while (have_rows('prod_informacoes')): the_row();
                                        $texto = get_sub_field('prod_indicador_texto');
                                        $porcentagem = get_sub_field('prod_indicador_valor');
                                        ?>
                                        <h2 style="line-height: 50px;" data-aos="fade-up" class="display-h2 mb-4">
                                            <?php echo get_sub_field('prod_desc_titulo'); ?>
                                        </h2>
                                        <p class="mb-3" data-aos="fade-up"><?php echo get_sub_field('prod_desc_descricao'); ?></p>
                                    <?php endwhile; ?>

                                </div>
                            </div>

                        </div>
                    </div>
                    <?php
                    if ($flexible_content_count === $layout_count): ?>
                        <?php include "footer-nav.php"; ?>
                    <?php endif; ?>
                </section>

            <?php endif; ?>

                <?php if (get_row_layout() == 'layout_linha_tempo'): ?>

                <section class="section" id="product-timeline">
                    <div style="bottom: -57px;
                position: relative;" data-aos="fade-up" class="container">
                        <div id="parallax-detalhe-1">
                            <div data-depth="0.2" class="d-flex justify-content-between">
                                <div class="trace-detail-left trace-detail-offset-up">
                                    <img class="" src="<?php bloginfo('template_url'); ?>/img/detalhes-traco-azul.png" alt="">
                                </div>
                                <div class="trace-detail-right ">
                                </div>
                            </div>
                        </div>
                        <h1 class="text-orange pb-2 pt-2 position-relative"><?php the_sub_field('prod_linha_temporal_secTitle') ?></h1>
                        <p class="text-gray position-relative"><?php the_sub_field('prod_linha_temporal_secDesc') ?></p>
                    </div>
                    <div class="container-fluid p-0">
                        <div class="timeline style-6" id="timeline-scroll">
                            <h3 style="white-space: normal;" class="d-md-none mx-3 my-5 text-gray font-weight-bold">
                                Principais marcos do projeto</h3>
                            <ol class="m-0">
                                <li class="timeline-spacing ">
                                    <div class="d-none d-md-block" style="width: 350px !important">

                                        <h3 class="text-gray font-weight-bold">Principais marcos do projeto</h3>
                                    </div>
                                </li>
                                <!-- Verifica se tem algum valor cadastrado no campo repetidor-->
                                <?php $count = 0; ?>
                                <?php if (have_rows('prod_linha_temporal')): while (have_rows('prod_linha_temporal')): the_row();
                                    // setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                                    //date_default_timezone_set('America/Sao_Paulo');
                                    //$date_string = get_sub_field('prod_data_tempo');
                                    $date_string = get_sub_field('prod_data_tempo');

                                    $field = get_sub_field('prod_link_tempo');
                                    $destinoUrl = esc_html($field['value']);
                                    ?>
                                    <?php if ($count <= 1): ?>
                                        <li>
                                            <div style="left: -90px" class="text-md-right ">
                                                <p class="text-gray-2 text-uppercase">
                                                    <?php //echo strftime('%d de %b %Y', strtotime($date_string)); ?>
                                                    <?php echo date_i18n('j \d\e M  Y', strtotime($date_string)) ?>

                                                </p>
                                                <p class="text-caption font-weight-bold text-blue">
                                                    <?php echo get_sub_field('prod_titulo_tempo'); ?></p>
                                                <p class="text-gray">
                                                    <small><?php echo get_sub_field('prod_desc_tempo'); ?></small>
                                                </p>
                                                <?php if ($destinoUrl != 'none'): ?>
                                                    <?php if ($destinoUrl == 'interno'): ?>
                                                        <a href="<?php echo get_sub_field('prod_linkinterno_tempo'); ?>"
                                                           class="btn btn-outline-light px-5">
                                                            acesse nosso
                                                            site</a>
                                                    <?php endif; ?>
                                                    <?php if ($destinoUrl == 'externo'): ?>
                                                        <a href="<?php echo get_sub_field('prod_linkexterno_tempo'); ?>" target="_blank"
                                                           class="btn btn-outline-light px-5">
                                                            acesse nosso
                                                            site</a>
                                                    <?php endif; ?>
                                                    <?php if ($destinoUrl == 'designer'): ?>
                                                        <a href="#" class="btn btn-outline-light px-5 openDesignerProduto" data-post="<?php the_ID(); ?>" data-indice="<?php echo $count; ?>">Designer
                                                            do produto</a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </li>
                                    <?php else: ?>

                                        <li class=" <?php if ($count == 2) {
                                            echo 'timeline-text-left';
                                        } ?>">
                                            <div>
                                                <p class="text-gray-2 text-uppercase">
                                                    <? //php echo strftime('%d de %b %Y', strtotime($date_string)); ?>
                                                    <?php echo date_i18n('j \d\e M  Y', strtotime($date_string)) ?>
                                                </p>

                                                <p class="text-caption font-weight-bold text-blue">
                                                    <?php echo get_sub_field('prod_titulo_tempo'); ?></p>
                                                <p class="text-gray">
                                                    <small><?php echo get_sub_field('prod_desc_tempo'); ?></small>
                                                </p>
                                                <?php if ($destinoUrl != 'none'): ?>
                                                    <?php if ($destinoUrl == 'interno'): ?>
                                                        <a href="<?php echo get_sub_field('prod_linkinterno_tempo'); ?>"
                                                           class="btn btn-outline-light px-5">
                                                            acesse nosso
                                                            site</a>
                                                    <?php endif; ?>
                                                    <?php if ($destinoUrl == 'externo'): ?>
                                                        <a href="<?php echo get_sub_field('prod_linkexterno_tempo'); ?>" target="_blank"
                                                           class="btn btn-outline-light px-5">
                                                            acesse nosso
                                                            site</a>
                                                    <?php endif; ?>
                                                    <?php if ($destinoUrl == 'designer'): ?>
                                                        <a href="#" class="btn btn-outline-light px-5 openDesignerProduto" data-post="<?php the_ID(); ?>" data-indice="<?php echo $count; ?>">Designer
                                                            do produto</a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                    <?php $count++; ?>
                                <?php endwhile; ?>
                                <?php endif; ?>
                                <li></li>
                            </ol>
                        </div>
                        <div class="d-none d-md-block">

                            <div class="d-flex justify-content-center">
                                <p class="mt-3 text-gray">Navegue horizontalmente</p>
                                <!-- <button class="btn arrow arrow__prev disabled"><i class="fas fa-chevron-left"></i></button> -->
                                <!-- <div class="arrow arrow__prev disabled p-3"><i class="fas fa-chevron-left"></i></div> -->
                                <!-- <button class="btn arrow arrow__next"><i class="fas fa-chevron-right"></i></button> -->
                                <!-- <div class=" arrow arrow__next p-3"><i class="fas fa-chevron-right"></i></div> -->
                                <button style="box-shadow: none;" class="btn" id="left-arrow">
                                    <span class="icon  icon-prev-icon"></span>
                                </button>
                                <button style="box-shadow: none;" class="btn" id="right-arrow">
                                    <span class="icon  icon-next-icon"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($flexible_content_count === $layout_count): ?>
                        <?php include "footer-nav.php"; ?>
                    <?php endif; ?>
                </section>

            <?php endif; ?>

                <?php if (get_row_layout() == 'layout_prod_carousel'): ?>

                <?php
                $section_titulo = get_sub_field('prod_carousel_titleSection');
                $section_tagline = get_sub_field('prod_carousel_taglineSection');

                $fundo_bg = "";
                $detail_bg = "";
                $carousel_color = "";
                switch (get_sub_field('prod_carousel_background')) {
                    case 'branco':
                        $fundo_bg = "bg-white";
                        $detail_bg = "normal-carousel-caption";
                        $carousel_color = "carrouselProdutosWhite-" . $countCarousel;
                        break;
                    case 'cinza':
                        $fundo_bg = "bg-gray";
                        $detail_bg = "normal-carousel-caption";
                        $carousel_color = "carrouselProdutosGray-" . $countCarousel;
                        break;
                    case 'azul':
                        $fundo_bg = "bg-blue";
                        $detail_bg = "custom-carousel-caption";
                        $carousel_color = "carrouselProdutosBlue-" . $countCarousel;
                        break;
                }
                ?>

                <!-- Verifica se tem algum valor cadastrado no campo repetidor-->
                <?php if (have_rows('prod_carousel_repeat')): ?>
                    <section class="section <?php echo $fundo_bg; ?>">
                        <div class="container-fluid p-0">

                            <div id="<?php echo $carousel_color; ?>" class="carousel slide" data-ride="carousel">
                                <!-- carousel-fade -->

                                <div class="carousel-inner">
                                    <?php $slidersCount = 0; ?>
                                    <?php while (have_rows('prod_carousel_repeat')): the_row();
                                        $destinoUrl = get_sub_field('prod_link_carousel');
                                        $slidersCount++;
                                        ?>
                                        <div class="carousel-item <?php if ($slidersCount == 1) echo "active"; ?> carousel-long">
                                            <div class="container <?php echo $detail_bg; ?>">
                                                <div class=" ">
                                                    <div class="text-center mb-2  mx-0 mb-md-5 mx-md-5">
                                                        <h2 style="line-height: 70px;" class="display-h2 "><?php echo $section_titulo; ?></h2>
                                                        <p><?php echo $section_tagline; ?></p>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div style="
                                                                    background-image: url(<?php the_sub_field('prod_carousel_img'); ?>);
                                                                    background-size: cover;
                                                                    background-position: center;
                                                                    " class="product-description-info">
                                                            </div> <!-- height: 431px; -->
                                                        </div>
                                                        <div class="col-md-6 pl-md-5 ">
                                                            <p style="letter-spacing: 0.1em;" class="text-uppercase text-gray ml-md-2"><?php the_sub_field('prod_carousel_tagline'); ?></p>
                                                            <h2 style="line-height: 60px; max-width: 400px;" class="display-h2 mb-2 ml-md-2">
                                                                <?php the_sub_field('prod_carousel_titulo'); ?></h2>
                                                            <p class="slider-width-limit ml-md-2"><?php the_sub_field('prod_carousel_descricao'); ?></p>
                                                            <?php if ($destinoUrl != 'none'): ?>
                                                                <?php if ($destinoUrl == 'interno'): ?>
                                                                    <a href="<?php echo get_sub_field('prod_linkinterno_carousel'); ?>" class="btn btn-outline-light bg-white px-5" title="Acessar">Acessar</a>
                                                                <?php endif; ?>
                                                                <?php if ($destinoUrl == 'externo'): ?>
                                                                    <a href="<?php echo get_sub_field('prod_linkexterno_carousel'); ?>" class="btn btn-outline-light bg-white px-5" title="Acessar" target="_blank">Acessar</a>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    <?php endwhile; ?>
                                </div>


                                <div class="container">

                                    <div class="custom-control-carrousel-center custom-control-bottom">

                                        <a style="margin-right: 5px" href="#<?php echo $carousel_color; ?>" role="button" data-slide="prev"
                                           class="btn <?php echo $fundo_bg == 'bg-blue' ? 'btn-light' : 'btn-primary' ?> btn-round"><span class="icon pt-2 pb-2 pl-1 icon-prev-icon"></span></a>
                                        <a style="margin-left: 5px" href="#<?php echo $carousel_color; ?>" role="button" data-slide="next"
                                           class="btn <?php echo $fundo_bg == 'bg-blue' ? 'btn-light' : 'btn-primary' ?> btn-round"><span class="icon pt-2 pb-2 pr-1 icon-next-icon"></span></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php
                        if ($flexible_content_count === $layout_count): ?>
                            <?php include "footer-nav.php"; ?>
                        <?php endif; ?>
                    </section>

                <?php endif; ?>

                <?php $countCarousel++; ?>
            <?php endif; ?>

                <?php if (get_row_layout() == 'layout_prod_indicadores'): ?>
                <?php
                $section_title = get_sub_field('prod_indicadores_secTitle');
                $section_desc = get_sub_field('prod_indicadores_secDesc');
                ?>
                <!-- Verifica se tem algum valor cadastrado no campo repetidor-->
                <?php if (have_rows('prod_indicadores')): ?>
                    <section class="section" id="indicadores">
                        <div class="container text-center my-5">
                            <h2 data-aos="fade-up" class="display-h2 text-orange"><?php echo $section_title; ?></h2>
                            <p class="mb-5 pb-3" data-aos="fade-up"><?php echo $section_desc; ?></p>
                            <div data-aos="flip-down" class="d-md-flex justify-content-center ">
                                <!-- row -->
                                <?php $linhas = 0; ?>
                                <?php while (have_rows('prod_indicadores')): the_row();
                                    $texto = get_sub_field('prod_indicador_texto');
                                    $porcentagem = get_sub_field('prod_indicador_valor');
                                    $porcentagem_cond = get_sub_field('prod_indicador_porcent');
                                    $linhas++;
                                    ?>
                                    <div style="max-width: 265px; margin-left: auto; margin-right: auto;" class="position-relative">
                                        <div style="transform: scaleX(-1); stroke-linecap: round;" id="progress-<?php echo $linhas; ?>"></div>
                                        <div class="graph-detail-holder">
                                            <?php if ($porcentagem_cond == 'sim'): ?>
                                                <h3 class="font-weight-bold mb-0"><?php echo $porcentagem; ?>%</h3>
                                            <?php endif; ?>
                                            <?php if ($porcentagem_cond == 'nao'): ?>
                                                <h3 class="font-weight-bold mb-0"><?php echo $porcentagem; ?></h3>
                                            <?php endif; ?>

                                            <p class="text-gray"><?php echo $texto; ?></p>
                                        </div>
                                        <?php if ($porcentagem_cond == 'sim'): ?>
                                            <script>
                                                if (document.getElementById("progress-<?php echo $linhas; ?>")) {
                                                    var circle = new ProgressBar.Circle('#progress-<?php echo $linhas; ?>', {
                                                        color: '#EA6724',
                                                        strokeWidth: 7,

                                                        trailColor: '#cccccc',
                                                        trailWidth: 1,

                                                        duration: 3000,
                                                        easing: 'easeInOut'
                                                    });
                                                    circle.animate(+<?php echo $porcentagem; ?>/100);
                                                }

                                            </script>
                                        <?php endif; ?>
                                        <?php if ($porcentagem_cond == 'nao'): ?>
                                            <script>
                                                if (document.getElementById("progress-<?php echo $linhas; ?>")) {
                                                    var circle = new ProgressBar.Circle('#progress-<?php echo $linhas; ?>', {
                                                        color: '#EA6724',
                                                        strokeWidth: 7,

                                                        trailColor: '#cccccc',
                                                        trailWidth: 1,

                                                        duration: 3000,
                                                        easing: 'easeInOut'
                                                    });
                                                    circle.animate(0 / 100);
                                                }

                                            </script>
                                        <?php endif; ?>

                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <?php
                        if ($flexible_content_count === $layout_count): ?>
                            <?php include "footer-nav.php"; ?>
                        <?php endif; ?>
                    </section>
                <?php endif; ?>
            <?php endif; ?>

                <?php if (get_row_layout() == 'layout_prod_texto'): ?>
                <?php
                $fundo_bg = "";
                switch (get_sub_field('prod_texto_bg')) {
                    case 'branco':
                        $fundo_bg = "bg-white";
                        break;
                    case 'cinza':
                        $fundo_bg = "bg-gray";
                        break;
                    case 'azul':
                        $fundo_bg = "bg-blue";
                        break;
                }
                ?>
                <section class="section <?php echo $fundo_bg; ?>">
                    <div style="margin-top: 90px" class="container ">
                        <div class="product-description-text  normal-detail-bg ">
                            <h2 style="line-height: 50px;" data-aos="fade-up" class="display-h2 mb-4 aos-init aos-animate">
                                <?php the_sub_field('prod_texto_titulo'); ?>
                            </h2>
                            <h3 style="line-height: 50px;" data-aos="fade-up" class=" mb-4 aos-init aos-animate">
                                <?php the_sub_field('prod_texto_subtitulo'); ?>
                            </h3>
                            <div class="mb-3 aos-init aos-animate" data-aos="fade-up">
                                <?php the_sub_field('prod_texto_paragrafo'); ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($flexible_content_count === $layout_count): ?>
                        <?php include "footer-nav.php"; ?>
                    <?php endif; ?>
                </section>
            <?php endif; ?>

                <!-- <div class="section"> -->
                <?php if (get_row_layout() == 'layout_prod_novidades'):

                $categoriaObj = get_sub_field('prod_novidades_category');
                $categoria_slug = esc_html($categoriaObj->slug);

                $ultimas_novidades = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => '3',
                    'category_name' => $categoria_slug
                ));

                if ($ultimas_novidades->have_posts()): ?>
                    <div class="section">
                        <section class=" text-center mt-5 pt-5 pb-0" id="ultimas-noticias">
                            <div class="container">
                                <div data-aos="flip-up" class="ultimas-novidades-title">
                                    <img src="<?php bloginfo('template_url'); ?>/img/paper.png" alt="">
                                    <h2 class="display-h2 text-orange">Últimas novidades</h2>
                                    <p>Encontre abaixo nossas últimas postagens e fique por dentro do que anda
                                        acontecendo
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
                                            <a href="<?php the_permalink(); ?>">
                                                <img src="<?php echo esc_url($capa_novidades); ?>" class="figure-img img-fluid rounded zoom-hover"
                                                     alt="...">
                                            </a>
                                            <a href="<?php the_permalink(); ?>">

                                                <p class="img-caption  text-uppercase">
                                                    <small><span class="text-gray-3">postado em</span>
                                                        <strong><?php echo get_the_time(__('j \d\e M  Y'), $post->id); ?></strong>
                                                    </small>
                                                </p>
                                            </a>
                                            <a href="<?php the_permalink(); ?>">
                                                <p style="max-width: 378px;" class="font-weight-bold text-caption-size"><?php the_title(); ?></p>
                                            </a>
                                            <a href="<?php the_permalink(); ?>">
                                                <p class="font-weight-regular text-gray-3"><?php echo get_the_excerpt(); ?></p>
                                            </a>
                                        </div>
                                    <?php endwhile;
                                    wp_reset_postdata(); ?>
                                    <div class="col-md-12">
                                        <div data-aos="zoom-in" class="d-flex justify-content-center confira-nov-btn">
                                            <a href="<?php bloginfo('home'); ?>/novidades" class="btn btn-primary px-5">Confira
                                                as novidades</a>
                                        </div>

                                    </div>
                                </div>
                                <div id="parallax-bush-1">
                                    <div data-depth="0.1" class="d-flex justify-content-between">
                                        <div>
                                            <img src="<?php bloginfo('template_url'); ?>/img/bush-md-2.png"
                                                 alt="">
                                        </div>
                                        <div>
                                            <img style="margin-top: 96px; transform: scaleX(-1)"
                                                 src="<?php bloginfo('template_url'); ?>/img/bush-sm.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <?php
                        if ($flexible_content_count === $layout_count): ?>
                            <?php include "footer-nav.php"; ?>
                        <?php endif; ?>
                    </div> <!-- fecha a div da sessão do footer -->

                <?php endif; // fecha a condicional ultimas novidades
                ?>
            <?php endif; // fecha a condicional layout_prod_novidades
                ?>

            <?php endwhile; // fecha flexible_content ?>
        <?php endif; // fecha flexible_content
            ?>

        <?php endwhile; // fecha have_posts ?>

    </div> <!-- fecha a div do fullpage -->

<?php get_footer(); ?>