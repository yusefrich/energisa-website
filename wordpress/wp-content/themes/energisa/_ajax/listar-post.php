<?php


function listarNovidades()
{
    $page = $_GET['page'];
    $args = [
        'post_type' => 'post',
        'posts_per_page' => 3,
        'paged' => $page,
    ];
    $posts = new WP_Query($args);
    $totalPages = $posts->max_num_pages;
    $pagina = $posts->query_vars['paged'];

    //echo '<pre>';
    //print_r($posts->query_vars['paged']);
   // echo '</pre>';
    ?>
    <?php
    if ($posts->have_posts()) : ?>
        <?php
        while ($posts->have_posts()): $posts->the_post();
            $capa_novidades = get_the_post_thumbnail_url(null, 'capa_380_255');
            ?>
            <div data-aos="fade-right" class="col-md-4 text-center my-3 px-2">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo esc_url($capa_novidades); ?>" class="figure-img img-fluid rounded zoom-hover" alt="img">
                </a>
                <a href="<?php the_permalink(); ?>">
                    <p class="img-caption  text-uppercase">
                        <small>postado em <strong><?php echo get_the_time(__('j \d\e M  Y'), $post->id); ?></strong>
                        </small>
                    </p>
                </a>
                <a href="<?php the_permalink(); ?>"><p class="font-weight-bold"><?php the_title(); ?></p></a>
                <a href="<?php the_permalink(); ?>">
                    <p class="font-weight-light"><?php echo get_the_excerpt(); ?></p>
                </a>
            </div>
        <?php endwhile; ?>

        <?php if ($totalPages > 1): ?>
        <div class="col-md-12">
            <div data-aos="flip-left" class="col-md-12 text-center mt-4">
                <button class="btn btn-outline-light px-5" data-pagina="<?php echo $pagina; ?>" id="btnLoadNews"> Mostrar mais</button>
            </div>
        </div>
    <?php endif; ?>

    <?php else: ?>
        <div class="alert alert-danger">Nenhum post encontrado.</div>
    <?php endif; ?>
    <?php exit;
}

add_action('wp_ajax_listarNovidades', 'listarNovidades');
add_action('wp_ajax_nopriv_listarNovidades', 'listarNovidades');