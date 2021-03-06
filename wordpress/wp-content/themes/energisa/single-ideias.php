<?php get_header(); ?>
    <section id="ideias-banner">
        <div style="
                background: linear-gradient(0deg, rgba(92, 40, 14, 0.8), rgba(92, 40, 14, 0.8)), url(<?php bloginfo('template_url'); ?>/img/ideias-header.png);
                background-size: cover;
                background-position: center;
                background-blend-mode:  normal;
                " class="container-fluid   product-banner-holder px-0 ">
            <!-- text-white -->
            <div class="product-banner text-center text-white ">
            </div>
        </div>
    </section>

    <section class="mb-5 pb-5" id="ideias-detail">

        <div class="container">
            <?php while (have_posts()) :
                the_post();
                //$foto = get_field('autor_foto', 'user_' . get_the_author_id());
                $foto = get_avatar_url(get_the_author_id(), array("size" => 150));
                // $thumbnail = $foto['sizes']['thumbnail'];
                $statusFiled = get_field('ideia_status');
                $votos = get_field('ideia_votos');
                $respostas = get_comments_number();
                ?>
                <div class="d-flex justify-content-start my-4">
                    <a style="box-shadow: none" href="<?php bloginfo('home'); ?>/ideias" class="btn ">

                        <p class="text-breadcrumb font-weight-bold mt-1"><i class="fas pr-3 pt-1 fa-chevron-left"></i>Retornar
                            para <span class="text-orange">Ideias</span></p>
                    </a>
                </div>
                <div data-aos="flip-left" class="text-ideias-format  mb-2 ">
                    <div class="pb-4 text-start">
                        <div class="d-flex justify-content-start pb-4">
                            <div class="profile-pic mr-4 mt-2" style="
                                    background-image: url(<?php echo $foto; ?>);
                                    background-size: cover;
                                    background-position: center;
                                    "></div>
                            <div>
                                <span class="text-fade"><small>Postado em <?php the_date('d/m/Y'); ?></small></span>
                                <p class=" card-user-name-lg m-0 font-weight-bold text-lg"><?php the_author_firstname(); ?>
                                    &nbsp;<?php the_author_lastname(); ?></p>

                            </div>
                        </div>
                        <p class="text-uppercase m-0">
                        <?php if ($statusFiled['label'] === "Concluído") : ?>
                            <small class="text-orange badge-green"><?php echo esc_html($statusFiled['label']); ?></small>
                        <?php elseif ($statusFiled['label'] === "Em análise") : ?>
                            <small class="text-orange badge-blue"><?php echo esc_html($statusFiled['label']); ?></small>
                        <?php else : ?>
                            <small class="text-orange badge-orange"><?php echo esc_html($statusFiled['label']); ?></small>
                        <?php endif; ?>
                            
                        </p>
                        <h2 class="font-weight-extra-bold text-caption display-h2"><?php the_title(); ?></h2>
                        <p class="m-0">
                            <small>
                                <span class="round-outline-text border-gray text-gray py-1 px-2 mx-1" id="qtd-votos"><?php echo $votos > 1 ? $votos . ' Votos' : $votos . ' Voto'; ?></span>
                                <span class="round-outline-text border-gray text-gray py-1 px-2 mx-1"><?php echo $respostas > 1 ? $respostas . ' Respostas' : $respostas . ' Resposta'; ?></span>
                            </small>
                        </p>
                        <!-- <img class="profile-pic float-left" height="48" src="./img/profile-1.jpg" alt=""> -->
                    </div>
                    <p class="m-0"><?php the_content(); ?></p> <!-- text-dark font-weight-normal mb-5 -->

                    <div class="d-flex justify-content-start">
                        <?php if (is_user_logged_in()): ?>
                            <button class="btn btn-outline-dark mr-2" id="btn-votar" data-postid="<?php the_ID(); ?>" data-tipo="1">
                                Votar
                            </button>
                        <?php else:; ?>
                            <button class="btn btn-outline-dark mr-2" id="btn-logar" data-postid="<?php the_ID(); ?>" data-tipo="1">
                                Votar
                            </button>
                        <?php endif; ?>

                        <a href="#respond" class="btn btn-outline-dark mr-2">Comentar</a>
                    </div>
                </div>

                <?php comments_template(); ?>

                <div style="margin-top: 100px !important" class="d-flex justify-content-start my-4">
                    <!--style="position: relative; top: 90px"  -->
                    <a style="box-shadow: none" href="<?php bloginfo('home'); ?>/ideias" class="btn">

                        <p class="text-breadcrumb font-weight-bold mt-1"><i class="fas pr-3 pt-1 fa-chevron-left"></i>Retornar
                            para <span class="text-orange">Ideias</span></p>
                    </a>

                </div>

            <?php endwhile; ?>
    </section>
<?php include "footer-nav.php"; ?>

<?php get_footer(); ?>