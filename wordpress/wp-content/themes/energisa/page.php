<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
    <?php $img_background = get_the_post_thumbnail_url(null, 'full'); ?>
    <section id="ideias-banner">
        <div style="
                background: url(<?php echo esc_url($img_background); ?>);
                background-size: cover;
                background-position: center;
                background-blend-mode:  normal;
                " class="container-fluid   product-banner-holder px-0 ">
            <!-- text-white -->
            <div class="product-banner text-center text-white ">
            </div>
        </div>
    </section>

    <section>
        <div class="container-small mx-auto">
            <div data-aos="flip-left" class="  mb-2 ">
                <div class="pb-4 text-start mt-5">
                    <h2 style="line-height: 60px;" class="font-weight-extra-bold text-caption display-h2"><?php the_title(); ?></h2>
                    <h4 style="line-height: 60px;" class="font-weight-extra-bold text-caption"><?php the_field('page_padrao_subtitulo') ?></h4>
                </div>

            </div>
        </div>
        <div class="container-small mx-auto">
            <?php the_content(); ?>
        </div>
    </section>
<?php endwhile; ?>

<section>
    <div class="container">
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
<?php include "footer-nav.php"; ?>
<?php get_footer(); ?>
