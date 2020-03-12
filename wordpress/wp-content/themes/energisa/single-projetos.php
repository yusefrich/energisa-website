<?php get_header(); ?>
<div id="fullpage">
    <?php while (have_posts()) :
    the_post(); ?>
    <?php $img_background = get_the_post_thumbnail_url(null, 'full'); ?>
    <section class="section" id="projetos-banner">
        <div style="
                background-image: url(<?php echo esc_url($img_background); ?>);
                background-size: cover;
                background-position: center;
                height: 100vh;
                background-blend-mode: multiply;
                " class="container-fluid   product-banner-holder px-0 ">
            <!-- text-white -->
            <div class="product-banner slider-title-center text-center text-white ">
                <p data-aos="fade-right" class="text-uppercase m-0">projeto</p>
                <h1 data-aos="fade-right"><?php the_title(); ?></h1>
                <p style="line-height: 42px;" data-aos="fade-left" class="text-caption"><?php echo get_the_excerpt(); ?></p>
            </div>
        </div>
    </section>


    <?php if (have_rows('projet_flexible_content')): ?>
    <?php while (have_rows('projet_flexible_content')):
    the_row(); ?>

    <!-- Verifica se existe o layout Informações do Projeto-->
    <?php if (get_row_layout() == 'projet_layout_info'): ?>
        <?php
        $fundo_bg = "";
        switch (get_sub_field('projet_info_bg')) {
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
        <section class="section <?php echo $fundo_bg ?>" id="projeto-detail">
            <div class="container">
                <div class="mb-5 pb-3" id="parallax-detalhe-1">
                    <div data-depth="0.2" class="d-flex justify-content-between">
                        <div style="z-index: 1;" class="trace-detail-left trace-detail-offset-bottom">
                            <img class="" src="<?php bloginfo('template_url'); ?>/img/detalhes-traco-laranja.png" alt="">
                        </div>
                        <div class="trace-detail-right">
                        </div>
                    </div>
                </div>
                <div data-aos="fade-up" class="row my-2 py-0 my-md-3 py-md-3 ">
                    <div class="col-md-4">
                        <h2 style="line-height: 65px;" class="text-orange font-weight-bold mt-5"><?php the_sub_field('projet_info_tituloOne'); ?></h2>
                    </div>
                    <div class="col-md-8">
                        <p style="line-height: 31px;" class="text-caption projeto-text-width ml-md-auto"><?php the_sub_field('projet_info_descOne'); ?></p>
                    </div>
                </div>
                <hr data-aos="fade-up" style="background-color: #E8E8E8;">
                <div data-aos="fade-up" class="row my-2 py-0 my-md-3 py-md-3">
                    <div class="col-md-6">
                        <div style="max-width: 400px">
                            <h2 style="line-height: 65px;" class="text-orange font-weight-bold mb-3"><?php the_sub_field('projet_info_tituloTwo'); ?></h2>
                            <p style="line-height: 31px;" class="font-weight-normal"><?php the_sub_field('projet_info_descTwo'); ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="max-width: 400px" class="ml-md-auto">
                            <h2 style="line-height: 65px;" class="text-orange font-weight-bold mb-3"><?php the_sub_field('projet_info_tituloThree'); ?></h2>
                            <ul>
                                <?php
                                $linhas = get_sub_field('projet_info_descThree');
                                $itens = preg_split('/<br[^>]*>/i', $linhas);
                                foreach ($itens as $value) {
                                    $valor = ltrim($value);// remove os espaços antes da string
                                    echo "<li><p style='line-height: 31px;' class='m-0'>$valor</p></li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <div style="height: 0px; position:relative; z-index: 100" class="container">
            <div class="mb-5 pb-3" id="parallax-detalhe-3">
                <div data-depth="0.2" class="d-flex justify-content-between">
                    <div class="trace-detail-left">
                    </div>
                    <div style="z-index: 1;" class="trace-detail-right trace-detail-offset-bottom">
                        <img class="" src="<?php bloginfo('template_url'); ?>/img/detalhes-pontos-laranja.png" alt="">
                    </div>
                </div>
            </div>

        </div>

    <?php endif; ?>

    <!-- Verifica se existe o layout de gráficos e indicadores-->
    <?php if (get_row_layout() == 'projet_layout_graph'): ?>
    <div class="section">
        <?php
        $fundo_bg = "";
        switch (get_sub_field('projet_graficos_bg')) {
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
        <section class="p-0 <?php echo $fundo_bg ?>" id="projeto-indicadores">
            <div class="container ">
                <div data-aos="fade-up" class="text-center mt-5 py-5">
                    <p class="text-gray">última atualização
                        <strong><?php the_modified_time('j \d\e F \d\e  Y'); ?></strong>
                    </p>
                    <h2 class="text-orange font-weight-bold">Confira abaixo os indicadores</h2>
                    <p>Veja em detalhes cada passo dado até o presente momento</p>
                </div>
                <div data-aos="fade-left" style="min-height: 600px" class="row mb-5 mt-2">
                    <?php if (have_rows('projet_graficos_repeat')): while (have_rows('projet_graficos_repeat')):
                        the_row();
                        ?>

                        <div style="padding-right: 10px; padding-left: 10px;" class="col-md-6 text-center mb-3">
                            <div style="height: 100%;" class="white-col p-3">
                                <p class="text-caption font-weight-bold"><?php the_sub_field('projet_grafico_titulo') ?></p>
                                <p class="text-gray">
                                    <small style="color: #979797"><?php the_sub_field('projet_grafico_descricao') ?></small>
                                </p>
                                <?php $grafico = get_sub_field('projet_grafico_chart') ?>
                                <div class="d-block justify-content-center">
                                    <?php echo do_shortcode($grafico); ?>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; ?>
                    <?php endif; ?>

                    <?php if (have_rows('projet_indicadores_repeat')): while (have_rows('projet_indicadores_repeat')): the_row();
                        ?>
                        <div style="padding-right: 10px; padding-left: 10px;" class="col-6 col-md-3 mb-3">
                            <div style="height: 100%" class="white-col p-3">
                                <p class=" font-weight-bold"><?php the_sub_field('projet_indicadores_titulo') ?></p>
                                <h3 class="text-orange font-weight-bold"><?php the_sub_field('projet_indicadores_percent') ?></h3>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php endif; ?>

                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- Verifica se existe o layout Status do Projeto-->
        <?php if (get_row_layout() == 'projet_layout_status'): ?>

        <section class="mt-0" id="progresso-geral-projeto">
            <div data-aos="fade-left">

                <div class="d-flex justify-content-center progresso-texto-projeto mt-2">
                    <p class="text-caption text-white mt-4 mr-3">Status do projeto</p>
                    <h2 class="display-h2 font-weight-bold text-white"><?php the_sub_field('projet_status'); ?>
                        %</h2>
                </div>
                <div style="width: <?php the_sub_field('projet_status'); ?>%;" class="progresso-atual-projeto"></div>
            </div>
        </section>
    </div>
<?php endif; ?>

    <!-- Verifica se existe o layout Linha do tempo de Projetos-->
    <?php if (get_row_layout() == 'projet_layout_linha_tempo'): ?>
    <div class="section">
        <section id="como-estamos-projeto" class="bg-gray">
            <div class="container">
                <div class="text-center mt-5 pt-5 pb-2">
                    <h2 class="text-orange font-weight-bold">Como estamos</h2>
                    <p style="max-width: 620px" class="text-gray m-auto">Acompanhe através da nossa linha do
                        tempo
                        as principais
                        etapas deste projeto e veja o
                        seu desenvolvimento</p>
                </div>
            </div>
            <div class="container-fluid p-0">
                <div data-aos="fade-left" class="timeline  style-6" id="timeline-scroll">
                    <h3 style="white-space: normal;" class="d-md-none mx-3 my-5 text-gray font-weight-bold">Principais
                        marcos do projeto</h3>

                    <ol style="margin-left: 300px; padding: 315px 0;">
                        <li style="display: none;" class=" timeline-spacing">
                            <div class="d-none d-md-block">
                                <h3 class="text-gray font-weight-bold">Principais marcos do projeto</h3>
                            </div>
                        </li>

                        <!-- Verifica se tem algum valor cadastrado no campo repetidor-->
                        <?php $count = 0; ?>
                        <?php if (have_rows('projet_linha_temporal')): while (have_rows('projet_linha_temporal')): the_row();
                            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                            date_default_timezone_set('America/Sao_Paulo');
                            $date_string = get_sub_field('projet_data_tempo');
                            $field = get_sub_field('projet_desc_status');
                            $count++;
                            ?>
                            <?php if ($count <= 2): ?>
                                <li class="text-right">
                                    <div style="    left: -85px;">
                                        <div class="d-flex justify-content-end">
                                            <p class="text-gray text-uppercase mb-0  mr-2">
                                                <small><?php echo strftime('%d de %b %Y', strtotime($date_string)); ?></small>
                                            </p>
                                            <span class="orange-outline-text py-1 px-2"><?php the_sub_field('projet_desc_tarefa'); ?></span>
                                        </div>

                                        <p class="text-caption font-weight-bold mb-0"><?php the_sub_field('projet_titulo_tempo'); ?></p>
                                        <p style="line-height: 1.2;" class="text-gray">
                                            <small><?php the_sub_field('projet_desc_tempo'); ?></small>
                                        </p>
                                        <div class="d-flex justify-content-end">
                                            <p class="pt-2 mt-1 pr-3">
                                                <small><?php echo esc_html($field['label']); ?></small>
                                            </p>
                                            <div class="p-0 timeline-progress-circle" id="como-estamos-graph-<?php echo $count; ?>"></div>
                                            <p class="timeline-andamento mt-1 timeline-andamento-projeto">
                                                <small class="font-weight-bold "><?php the_sub_field('projet_desc_andamento'); ?>
                                                    %
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                    <script>
                                        if (document.getElementById("como-estamos-graph-<?php echo $count; ?>")) {
                                            var circle = new ProgressBar.Circle('#como-estamos-graph-<?php echo $count; ?>', {
                                                color: '#EA6724',
                                                strokeWidth: 10,

                                                trailColor: '#cccccc',
                                                trailWidth: 1,

                                                duration: 3000,
                                                easing: 'easeInOut'
                                            });
                                            circle.animate(+<?php the_sub_field('projet_desc_andamento'); ?>/100);
                                        }

                                    </script>

                                </li>

                            <?php else: ?>
                                <li class=" <?php if ($count == 3) {
                                    echo 'timeline-text-left';
                                } ?>">
                                    <div>
                                        <div class="d-flex justify-content-start">
                                            <span class="orange-outline-text py-1 px-2 mr-2"><?php the_sub_field('projet_desc_tarefa'); ?></span>
                                            <p class="text-gray text-uppercase mb-0 mr-2">
                                                <small><?php echo strftime('%d de %b %Y', strtotime($date_string)); ?></small>
                                            </p>
                                        </div>

                                        <p class="text-caption font-weight-bold mb-0"><?php the_sub_field('projet_titulo_tempo'); ?></p>
                                        <p style="line-height: 1.2;" class="text-gray">
                                            <small><?php the_sub_field('projet_desc_tempo'); ?></small>
                                        </p>
                                        <div class="d-flex justify-content-start">
                                            <p class="pt-2 mt-1 pr-3">
                                                <small><?php echo esc_html($field['label']); ?></small>
                                            </p>
                                            <div class="p-0 timeline-progress-circle" id="como-estamos-graph-<?php echo $count; ?>"></div>
                                            <p class="timeline-andamento mt-1 timeline-andamento-projeto">
                                                <small class="font-weight-bold "><?php the_sub_field('projet_desc_andamento'); ?>
                                                    %
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                    <script>
                                        if (document.getElementById("como-estamos-graph-<?php echo $count; ?>")) {
                                            var circle = new ProgressBar.Circle('#como-estamos-graph-<?php echo $count; ?>', {
                                                color: '#EA6724',
                                                strokeWidth: 10,

                                                trailColor: '#cccccc',
                                                trailWidth: 1,

                                                duration: 3000,
                                                easing: 'easeInOut'
                                            });
                                            circle.animate(+<?php the_sub_field('projet_desc_andamento'); ?>/100);
                                        }

                                    </script>

                                </li>

                            <?php endif; ?>

                        <?php endwhile; ?>
                        <?php endif; ?>
                        <li></li>
                    </ol>

                </div>
                <div class="d-none d-md-block">

                    <div class="d-flex justify-content-center ">
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


        </section>
        <?php endif; ?>
        <?php endwhile; ?>



        <?php endif; ?>


        <?php endwhile; ?>
        <?php include "footer-nav.php"; ?>
    </div>

</div> <!-- fecha a div do fullpage -->

<?php get_footer(); ?>
