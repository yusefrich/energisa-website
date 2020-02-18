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

<section id="ideias-todos">
    <div class="container">

        <div class="text-start my-5 py-5">
            <img class="float-left pr-5" src="<?php bloginfo('template_url'); ?>/img/ideias.png" alt="">
            <h2 class="text-orange display-h2">Colabore você também</h2>
            <p>Aqui você encontrará uma serie de ideias sugeridas pelos nossos colaboradores, fique a vontade para
                participar.</p>
            <button class="btn btn-primary px-5">Quero colaborar</button>

        </div>

        <div class="row">
            <div class="col-md-3">
                <p class="text-caption font-weight-bold">Filtre por produto</p>
                <select class="custom-select">
                    <option selected>Todos</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <div class="card-outline mt-4 p-4">
                    <p class="text-caption font-weight-bold">Status</p>
                    <a class="text-gray btn p-0 mb-3" href="#">Mais votados (14)</a><br>
                    <a class="text-gray btn p-0 mb-3" href="#">Em análise (1)</a><br>
                    <a class="text-gray btn p-0 mb-3" href="#">Em Votação (4)</a><br>
                    <a class="text-gray btn p-0 mb-3" href="#">Concluído (14)</a><br>
                </div>
                <div class="card-outline mt-4 p-4">
                    <p class="text-caption font-weight-bold">Tags</p>
                    <?php
                    $tags = get_tags(array(
                        'hide_empty' => true
                    ));

                    foreach ($tags as $tag) {
                        echo "<a class=\"text-gray btn p-0 mb-3\" href=\"#\">#$tag->name  ($tag->count)</a><br>";
                    }

                    ?>
                    <button class="btn btn-sm px-5 text-gray"><strong> Mostrar mais</strong></button>

                </div>
                <div class="card-outline mt-4 mb-4 p-4">
                    <p class="text-caption font-weight-bold">Quem mais participa</p>
                    <div class="d-flex justify-content-start py-2">
                        <div class="profile-pic pr-5 mr-1" style="
                                background-image: url(<?php bloginfo('template_url'); ?>/img/profile-1.jpg);
                                background-size: cover;
                                background-position: center;
                                "></div>
                        <div>
                            <p class="card-user-name m-0">Francisco José Vieira Martins</p>

                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-sm px-5 text-gray"><strong> Mostrar mais</strong></button>

                </div>
            </div>


            <div class="col-md-9">
                <?php while (have_posts()) : the_post(); ?>
                    <?php $statusFiled = get_field('ideia_status');
                    $foto = get_field('autor_foto', 'user_' . get_the_author_id());
                    $thumbnail = $foto['sizes']['thumbnail'];
                    ?>

                    <div data-aos="flip-left" class="  mb-2 p-2">
                        <div class="pb-4 text-start">
                            <div class="d-flex justify-content-start pb-4">
                                <div class="profile-pic mr-4" style="
                                        background-image: url(<?php echo $thumbnail; ?>);
                                        background-size: cover;
                                        background-position: center;
                                        "></div>
                                <div>
                                    <span class="text-fade"><small>Postado <?php the_date('d/m/Y'); ?></small></span>
                                    <p class="card-user-name m-0"><?php the_author_firstname(); ?>
                                        &nbsp;<?php the_author_lastname(); ?></p>

                                </div>
                            </div>
                            <p class="text-uppercase">
                                <small class="text-orange"><?php echo esc_html($statusFiled['label']); ?></small>
                            </p>
                            <a href="<?php the_permalink(); ?>">
                                <p class="font-weight-extra-bold text-caption"><?php the_title(); ?></p>
                            </a>
                            <p>
                                <small>
                                    <?php if (get_field('ideia_votos')): ?>
                                        <span class="round-outline-text py-1 px-2 mx-1"><?php the_field('ideia_votos'); ?> Votos</span>
                                    <?php endif; ?>
                                    <span class="round-outline-text py-1 px-2 mx-1">3 Respostas</span>
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
                    </div>
                    <hr>
                <?php endwhile; ?>

                <div data-aos="flip-left" class="text-center mt-4 mb-5 pb-5">
                    <button class="btn btn-outline-light px-5"> Mostrar mais</button>
                </div>
            </div>
        </div>
    </div>

</section>


<?php get_footer(); ?>
