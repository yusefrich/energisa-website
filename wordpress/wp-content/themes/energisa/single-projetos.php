<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
    <?php $img_background = get_the_post_thumbnail_url(null, 'full'); ?>
    <section id="projetos-banner">
        <div style="
                background: linear-gradient(0deg, rgba(92, 40, 14, 0.8), rgba(92, 40, 14, 0.8)), url(<?php echo esc_url($img_background); ?>);
                background-size: cover;
                background-position: center;
                background-blend-mode: multiply, normal;
                " class="container-fluid   product-banner-holder px-0 ">
            <!-- text-white -->
            <div class="product-banner text-center text-white ">
                <p data-aos="fade-right" class="text-uppercase m-0">projeto</p>
                <h1 data-aos="fade-right"><?php the_title(); ?></h1>
                <p data-aos="fade-left" class="text-caption"><?php echo get_the_excerpt(); ?></p>
            </div>
        </div>
    </section>


    <?php if (have_rows('projet_flexible_content')): ?>
        <?php while (have_rows('projet_flexible_content')): the_row(); ?>

            <!-- Verifica se existe o layout Informações do Projeto-->
            <?php if (get_row_layout() == 'projet_layout_info'): ?>
                <section id="projeto-detail">
                    <div class="container">
                        <div id="parallax-detalhe-2">
                            <div data-depth="0.2" class="d-flex justify-content-between">
                                <div style="z-index: 1;" class="trace-detail-left trace-detail-offset-bottom">
                                    <img class="" src="<?php bloginfo('template_url'); ?>/img/detalhes-traco-laranja.png" alt="">
                                </div>
                                <div class="trace-detail-right">
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-up" class="row my-5 py-5 ">
                            <div class="col-md-5">
                                <h2 class="text-orange font-weight-bold mt-5"><?php the_sub_field('projet_info_tituloOne'); ?></h2>
                            </div>
                            <div class="col-md-7">
                                <p class="text-caption text-dark"><?php the_sub_field('projet_info_descOne'); ?></p>
                            </div>
                        </div>
                        <div data-aos="fade-up" class="row my-5 py-5">
                            <div class="col-md-6">
                                <div style="max-width: 400px">
                                    <h2 class="text-orange font-weight-bold mb-3"><?php the_sub_field('projet_info_tituloTwo'); ?></h2>
                                    <p class="font-weight-normal"><?php the_sub_field('projet_info_descTwo'); ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="max-width: 400px">
                                    <h2 class="text-orange font-weight-bold mb-3"><?php the_sub_field('projet_info_tituloThree'); ?></h2>
                                    <ul>
                                        <?php
                                        $linhas = get_sub_field('projet_info_descThree');
                                        $itens = preg_split('/<br[^>]*>/i', $linhas);
                                        foreach ($itens as $value) {
                                            $valor = ltrim($value);// remove os espaços antes da string
                                            echo "<li><p>$valor</p></li>";
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            <?php endif; ?>


            <!-- Verifica se existe o layout de gráficos e indicadores-->
            <?php if (get_row_layout() == 'projet_layout_graph'): ?>
                <section class="p-0" id="projeto-indicadores">
                    <div class="container">
                        <div data-aos="fade-up" class="text-center mt-5 py-5">
                            <p class="text-gray">última atualização
                                <strong><?php the_modified_time('j \d\e F \d\e  Y'); ?></strong>
                            </p>
                            <h2 class="text-orange font-weight-bold">Confira abaixo os indicadores</h2>
                            <p>Veja em detalhes cada passo dado até o presente momento</p>
                        </div>
                        <div data-ao
                             s="fade-left" class="row mb-5 mt-2">
                            <?php if (have_rows('projet_graficos_repeat')): while (have_rows('projet_graficos_repeat')):
                                the_row();
                                ?>

                                <div class="col-md-6 text-center mb-3">
                                    <div class="white-col p-3">
                                        <p class="text-caption font-weight-bold"><?php the_sub_field('projet_grafico_titulo') ?></p>
                                        <p class="text-gray">
                                            <small><?php the_sub_field('projet_grafico_descricao') ?></small>
                                        </p>
                                        <?php $grafico =  get_sub_field('projet_grafico_chart')?>
                                        <div class="d-flex justify-content-center">
                                            <?php echo do_shortcode($grafico); ?>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                            <?php endif; ?>


                            <?php if (have_rows('projet_indicadores_repeat')): while (have_rows('projet_indicadores_repeat')): the_row();
                                ?>
                                <div class="col-6 col-md-3 mb-3">
                                    <div class="white-col p-3">
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
                <section id="progresso-geral-projeto">
                    <div data-aos="fade-left" class="d-flex justify-content-center progresso-texto-projeto mt-2">
                        <p class="text-caption text-white mt-4 mr-3">Status do projeto</p>
                        <h2 class="display-h2 font-weight-bold text-white"><?php the_sub_field('projet_status'); ?>
                            %</h2>
                    </div>
                    <div data-aos="fade-right" style="width: <?php the_sub_field('projet_status'); ?>%;" class="progresso-atual-projeto"></div>
                </section>
            <?php endif; ?>


            <!-- Verifica se existe o layout Linha do tempo de Projetos-->
            <?php if (get_row_layout() == 'projet_layout_linha_tempo'): ?>
                <section id="como-estamos-projeto">
                    <div class="container">
                        <div class="text-center mt-5 py-5">
                            <h2 class="text-orange font-weight-bold">Como estamos</h2>
                            <p style="max-width: 620px" class="text-gray m-auto">Acompanhe através da nossa linha do
                                tempo
                                as principais
                                etapas deste projeto e veja o
                                seu desenvolvimento</p>
                        </div>
                    </div>
                    <div class="container-fluid p-0">
                        <div data-aos="fade-left" class="timeline" id="timeline-scroll">
                            <ol>
                                <li class="timeline-spacing">
                                    <div>

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
                                    <li>
                                        <div>
                                            <p class="text-gray text-uppercase float-left mr-2">
                                                <small><?php echo strftime('%d de %b %Y', strtotime($date_string)); ?></small>
                                            </p>
                                            <span class="orange-outline-text py-1 px-2 mr-2"><?php the_sub_field('projet_desc_tarefa'); ?></span>

                                            <p class="text-caption font-weight-bold"><?php the_sub_field('projet_titulo_tempo'); ?></p>
                                            <p class="text-gray">
                                                <small><?php the_sub_field('projet_desc_tempo'); ?></small>
                                            </p>
                                            <div class="d-flex justify-content-start">
                                                <p class="pt-1 pr-3">
                                                    <small><?php echo esc_html($field['label']); ?></small>
                                                </p>
                                                <div class="p-0 timeline-progress-circle" id="como-estamos-graph-<?php echo $count; ?>"></div>
                                                <p class="timeline-andamento mt-1" style="left: -48px; top: 12px; position: relative;">
                                                    <small class="font-weight-bold "><?php the_sub_field('projet_desc_andamento'); ?>%
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                        <script>
                                        if(document.getElementById("como-estamos-graph-<?php echo $count; ?>")){
                                            var circle = new ProgressBar.Circle('#como-estamos-graph-<?php echo $count; ?>', {
                                                color: '#EA6724',
                                                strokeWidth: 15,

                                                trailColor: '#cccccc',
                                                trailWidth: 1,

                                                duration: 3000,
                                                easing: 'easeInOut'
                                            });
                                            circle.animate(+<?php the_sub_field('projet_desc_andamento'); ?>/100);
                                        }

                                    </script>

                                    </li>
                                <?php endwhile; ?>
                                <?php endif; ?>
                                <li></li>
                            </ol>

                        </div>
                                <div class="d-flex justify-content-center">
                                    <p class="mt-3 text-gray">Navegue horizontalmente</p>
                                    <!-- <button class="btn arrow arrow__prev disabled"><i class="fas fa-chevron-left"></i></button> -->
                                    <!-- <div class="arrow arrow__prev disabled p-3"><i class="fas fa-chevron-left"></i></div> -->
                                    <!-- <button class="btn arrow arrow__next"><i class="fas fa-chevron-right"></i></button> -->
                                    <!-- <div class=" arrow arrow__next p-3"><i class="fas fa-chevron-right"></i></div> -->
                                    <span class="icon pt-4 pb-2 pl-3 icon-prev-icon"></span>
                                    <span class="icon pt-4 pb-2 pl-1 icon-next-icon"></span>
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

                    </div>

                </section>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>


<?php endwhile; ?>
<?php get_footer(); ?>
