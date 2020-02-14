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
                            <h2 class="text-orange font-weight-bold mt-5">O projeto</h2>
                        </div>
                        <div class="col-md-7">
                            <p class="text-caption text-dark">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                In faucibus
                                aenean amet integer augue neque. At urna scelerisque blandit duis consequat eu purus.
                                Commodo
                                tellus, enim diam et vitae aliquet fusce. Purus ullamcorper proin convallis feugiat in
                                nec
                                scelerisque ac.</p>
                        </div>
                    </div>
                    <div data-aos="fade-up" class="row my-5 py-5">
                        <div class="col-md-6">
                            <div style="max-width: 400px">
                                <h2 class="text-orange font-weight-bold mb-3">Resultados esperados</h2>
                                <p class="font-weight-normal">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    In faucibus
                                    aenean amet integer augue neque. At urna scelerisque blandit duis consequat eu
                                    purus.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="max-width: 400px">

                                <h2 class="text-orange font-weight-bold mb-3">Áreas envolvidas</h2>
                                <ul>
                                    <li>
                                        <p>COCD</p>
                                    </li>
                                    <li>
                                        <p>Tl Time</p>
                                    </li>
                                    <li>
                                        <p>Time de Projetos</p>
                                    </li>
                                    <li>
                                        <p>Equipe de Redação</p>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

            </section>
            <section class="p-0" id="projeto-indicadores">
                <div class="container">
                    <div data-aos="fade-up" class="text-center mt-5 py-5">
                        <p class="text-gray">última atualização <strong>10 de janeiro 2020</strong></p>
                        <h2 class="text-orange font-weight-bold">Confira abaixo os indicadores</h2>
                        <p>Veja em detalhes cada passo dado até o presente momento</p>
                    </div>

                    <div data-aos="fade-left" class="row mb-5 mt-2">
                        <div class="col-md-6 text-center mb-3">
                            <div class="white-col p-3">
                                <p class="text-caption font-weight-bold">Lorem ipsum dolor sit amet</p>
                                <p class="text-gray">
                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing</small>
                                </p>
                                <div class="d-flex justify-content-start p-3">
                                    <div>
                                        <canvas width="270" height="270" id="chart2"></canvas>
                                    </div>
                                    <div class="labels text-left">
                                        <p class="text-gray font-weight-light">
                                            <small>Legendas</small>
                                        </p>
                                        <p><span class="label-dot" style="color: #0071A2">&#149;</span>
                                            <small> Cor Azul
                                                Escuro
                                            </small>
                                        </p>
                                        <p><span class="label-dot" style="color: #70BF54">&#149;</span>
                                            <small> Cor Verde</small>
                                        </p>
                                        <p><span class="label-dot" style="color: #089BC0">&#149;</span>
                                            <small> Cor Azul
                                                Claro
                                            </small>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center mb-3">
                            <div class="white-col p-3">
                                <p class="text-caption font-weight-bold">Lorem ipsum dolor sit amet</p>
                                <p class="text-gray">
                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing</small>
                                </p>
                                <div class="d-flex justify-content-start p-3">
                                    <div>
                                        <canvas width="270" height="270" id="myChart"></canvas>
                                    </div>
                                    <div class="labels text-left">
                                        <p class="text-gray font-weight-light">
                                            <small>Legendas</small>
                                        </p>
                                        <p><span class="label-dot" style="color: #0071A2">&#149;</span>
                                            <small> Cor Azul
                                                Escuro
                                            </small>
                                        </p>
                                        <p><span class="label-dot" style="color: #70BF54">&#149;</span>
                                            <small> Cor Verde</small>
                                        </p>
                                        <p><span class="label-dot" style="color: #089BC0">&#149;</span>
                                            <small> Cor Azul
                                                Claro
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <div class="white-col p-3">
                                <p class=" font-weight-bold"> Lorem ipsum dolor sit amet</p>
                                <h3 class="text-orange font-weight-bold">1 233</h3>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <div class="white-col p-3">
                                <p class=" font-weight-bold">Lorem ipsum dolor sit amet</p>
                                <h3 class="text-orange font-weight-bold">78%</h3>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <div class="white-col p-3">
                                <p class=" font-weight-bold">Lorem ipsum dolor sit amet</p>
                                <h3 class="text-orange font-weight-bold">56</h3>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-3">
                            <div class="white-col p-3">
                                <p class=" font-weight-bold">Lorem ipsum dolor sit amet</p>
                                <h3 class="text-orange font-weight-bold">36%</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <!-- Verifica se existe o layout Status do Projeto-->
            <?php if (get_row_layout() == 'projet_layout_status'): ?>
                <section id="progresso-geral-projeto">
                    <div data-aos="fade-left" class="d-flex justify-content-center progresso-texto-projeto mt-2">
                        <p class="text-caption text-white mt-4 mr-3">Status do projeto</p>
                        <h2 class="display-h2 font-weight-bold text-white"><?php the_sub_field('projet_status'); ?>%</h2>
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
                        <div data-aos="fade-left" class="timeline">
                            <ol>
                                <!-- Verifica se tem algum valor cadastrado no campo repetidor-->
                                <?php $count = 0; ?>
                                <?php if (have_rows('projet_linha_temporal')): while (have_rows('projet_linha_temporal')): the_row();
                                    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                                    date_default_timezone_set('America/Sao_Paulo');
                                    $date_string = get_sub_field('projet_data_tempo');
                                    $count ++;
                                    ?>
                                    <li>
                                        <div>
                                            <p class="text-gray text-uppercase float-left mr-2">
                                                <small><?php echo strftime('%d de %b %Y', strtotime($date_string)); ?></small>
                                            </p>
                                            <span class="orange-outline-text py-1 px-2 mr-2 ">Aprovação</span>

                                            <p class="text-caption font-weight-bold"><?php the_sub_field('projet_titulo_tempo'); ?></p>
                                            <p class="text-gray">
                                                <small><?php the_sub_field('projet_desc_tempo'); ?></small>
                                            </p>
                                            <div class="d-flex justify-content-start">
                                                <p class="pt-1 pr-3">
                                                    <small>ANDAMENTO</small>
                                                </p>
                                                <div class="p-0 timeline-progress-circle" id="como-estamos-graph-<?php echo $count; ?>"></div>
                                                <p style="left: -40px; top: 8px; position: relative;">
                                                    <small class="font-weight-bold"><?php the_sub_field('projet_desc_andamento'); ?>%</small>
                                                </p>
                                            </div>
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
