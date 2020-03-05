<?php get_header(); ?>
<section id="ideias-banner">
    <div style="
            background: linear-gradient(0deg, rgba(8, 155, 192, 0.7), rgba(8, 155, 192, 0.7)), url(<?php bloginfo('template_url'); ?>/img/novidades-header.png);
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
    <?php while (have_posts()) :
        the_post();
        $likes = get_post_meta(get_the_ID(), 'post_likes', true);
        ?>
        <div class="container-small mx-auto">
            <div class="d-flex justify-content-start my-4 pt-4">
                <a href="<?php bloginfo('home'); ?>/novidades" class="btn p-0">

                    <p class="text-breadcrumb font-weight-bold mt-1"><i class="fas pr-3 pt-1 fa-chevron-left"></i>Retornar
                        para <span class="text-orange">Novidades</span></p>
                </a>
            </div>
            <div data-aos="flip-left" class="  mb-2 ">
                <div class="pb-4 text-start">
                    <p class="img-caption  text-uppercase mb-0">
                        <small class="text-gray">
                            <?php the_date('j \d\e M  Y'); ?>
                        </small>
                    </p>
                    <h2 style="line-height: 60px;" class="font-weight-extra-bold text-caption display-h2"><?php the_title(); ?></h2>
                    <!-- <img class="profile-pic float-left" height="48" src="./img/profile-1.jpg" alt=""> -->
                </div>
            </div>
        </div>

        <?php if (have_rows('content')): ?>
        <?php while (have_rows('content')): the_row(); ?>

            <?php if (get_row_layout() == 'layout_post_texto'): ?>
                <div class="container-small mx-auto">
                    <p style="line-height: 42px;" class="text-dark font-weight-normal mb-5"><?php the_sub_field('post_texto'); ?></p>
                </div>
            <?php endif; ?>

            <?php if (get_row_layout() == 'layout_post_image'): ?>
                <div class="container-fluid img-post-container mb-5">
                    <img width="100%" height="auto" src="<?php the_sub_field('post_image_ful'); ?>" alt="">
                </div>
            <?php endif; ?>

        <?php endwhile; ?>
    <?php endif; ?>


        <div class="container-small mx-auto">
            <div data-aos="flip-left" class=" mb-2">
                <div class="d-flex justify-content-start">
                    <button class="btn btn-outline-dark mr-2" id="btn-like" data-postid="<?php the_ID() ;?>" data-tipo="1">Gostei <span>(<?php echo $likes > 0 ? $likes : '0'; ?>)</span></button>
                    <a href="#respond" class="btn btn-outline-dark mr-2">Comentar</a>
                </div>
            </div>

            <?php comments_template(); ?>

            <div style="margin-top: 100px !important" class="d-flex justify-content-start my-4 pt-5">
                <a href="<?php bloginfo('home'); ?>/novidades" class="btn">
                    <p class="text-breadcrumb font-weight-bold mt-1"><i class="fas pr-3 pt-1 fa-chevron-left"></i>Retornar
                        para <span class="text-orange">Novidades</span></p>
                </a>
            </div>
        </div>


    <?php endwhile; ?>
</section>

<?php
$posts_relacionados = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => '3',
));

if ($posts_relacionados->have_posts()): ?>
    <section class="text-center mt-5 pb-0" id="novidades-artigos-relacionados">
        <div class="container-fluid px-5">
            <div data-aos="flip-up" class="ultimas-novidades-title">
                <h2 class="display-h2 text-orange">Artigos relacionados</h2>
            </div>
            <div class="row mt-5">
                <?php
                while ($posts_relacionados->have_posts()): $posts_relacionados->the_post();
                    $capa_novidades = get_the_post_thumbnail_url(null, 'capa_380_255');
                    ?>
                    <div data-aos="fade-right" class="col-md-4">
                        <a href="<?php the_permalink(); ?>">
                            <img style="width: 100%;" src="<?php echo esc_url($capa_novidades); ?>" class="figure-img img-fluid rounded zoom-hover" alt="...">
                        </a>
                        <a href="<?php the_permalink(); ?>">
                            <p class="img-caption  text-uppercase">
                                <small>postado em
                                    <strong> <?php echo get_the_time(__('d \d\e M  Y'), $post->id); ?> </strong></small>
                            </p>
                        </a>
                        <a href="<?php the_permalink(); ?>"><p class="font-weight-bold"><?php the_title(); ?></p></a>
                        <a href="<?php the_permalink(); ?>">
                            <p class="font-weight-light"><?php echo get_the_excerpt(); ?></p>
                        </a>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
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
<?php endif; ?>
<?php include "footer-nav.php"; ?>
<?php get_footer(); ?>
