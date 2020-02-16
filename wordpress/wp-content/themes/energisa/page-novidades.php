<?php get_header(); /* Template Name: Novidades */ ?>
<section id="product-banner">
    <div style="
            background: linear-gradient(0deg, rgba(8, 155, 192, 0.7), rgba(8, 155, 192, 0.7)), url(<?php bloginfo('template_url'); ?>/img/novidades-header.png);
            background-size: cover;
            background-position: center;
            background-blend-mode: multiply, normal;
            " class="container-fluid   product-banner-holder px-0 ">
        <!-- text-white -->
        <div class="product-banner text-center text-white ">
            <h1 data-aos="fade-right">Fique por dentro das novidades</h1>
            <p data-aos="fade-left" class="text-caption">Aqui vamos compartilhar as informações desenvolvido por nossa
                equipe, acompanhe nossas postagens e mantenha-se sempre bem informado.</p>
        </div>
    </div>
</section>


<section id="product-todos">
    <div class="container">
        <div class="text-center my-5">
            <img src="<?php bloginfo('template_url'); ?>/img/paper.png" alt="">
            <h1 class="text-orange">Nossos artigos</h1>
            <p style="max-width: 640px;" class="text-gray m-auto">Encontre abaixo nossas últimas postagens e fique por
                dentro do que anda acontecendo no nosso setor, fique bem informado</p>
        </div>

        <div class="row mt-5">
            <?php
            $args_novidades = array(
                'paged' => $paged,
                'post_type' => 'post',
                'posts_per_page' => 9,
            );
            $temp = $wp_query;
            $wp_query = null;
            $wp_query = new WP_Query($args_novidades);
            if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
                $capa_novidades = get_the_post_thumbnail_url(null, 'capa_380_255');
                ?>
                <div data-aos="fade-right" class="col-md-4 text-center my-4">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo esc_url($capa_novidades); ?>" class="figure-img img-fluid rounded zoom-hover" alt="...">
                    </a>
                    <a href="<?php the_permalink(); ?>">
                        <p class="img-caption  text-uppercase">
                            <small>postado em <strong><?php echo get_the_time(__('j \d\e M  Y'), $post->id); ?></strong></small>
                        </p>
                    </a>
                    <a href="<?php the_permalink(); ?>"><p class="font-weight-bold"><?php the_title(); ?></p></a>
                    <a href="<?php the_permalink(); ?>">
                        <p class="font-weight-light"><?php echo get_the_excerpt(); ?></p>
                    </a>
                </div>
            <?php
            endwhile; endif;
            //if (function_exists('wp_pagenavi')) ;
            //echo '<div class="paginacao">';
            //{
                //wp_pagenavi();
                //echo '</div>';
            //}
            $wp_query = null;
            $wp_query = $temp;
            wp_reset_query();
            ?>


            <div class="col-md-12">
                <div data-aos="flip-left" class="col-md-12 text-center mt-4">
                    <button class="btn btn-outline-light px-5"> Mostrar mais</button>
                </div>

            </div>
        </div>


        <!-- <div id="parallax-bush-1">
            <div data-depth="0.1" class="d-flex justify-content-between">
                <div>
                    <img style="transform: scaleX(-1)" src="./img/bush-md.png" alt="">
                </div>
                <div>
                    <img style="margin-top: 96px; transform: scaleX(-1)" src="./img/bush-sm.png" alt="">
                </div>
            </div>
        </div> -->
        <div class="pt-5" id="parallax-hand-1">
            <div data-depth="0.5" class="d-flex justify-content-center mb-auto">
                <img src="<?php bloginfo('template_url'); ?>/img/person-cut.png" alt="">
            </div>
        </div>


    </div>

</section>
<?php get_footer(); ?>
