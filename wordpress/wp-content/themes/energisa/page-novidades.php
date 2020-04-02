<?php get_header(); /* Template Name: Novidades */ ?>
<section id="product-banner">
    <?php
    $topo = new WP_Query(array(
        'pagename' => 'chamada-novidades',
    ));
    while ($topo->have_posts()): $topo->the_post();
        ?>
        <div style="
                background: linear-gradient(0deg, rgba(<?php the_field('page_interna_color'); ?>), rgba(<?php the_field('page_interna_color'); ?>)), url(<?php the_field('page_interna_img'); ?>);
                background-size: cover;
                background-position: center;
                background-blend-mode: multiply, normal;
                " class="container-fluid   product-banner-holder px-0 ">
            <!-- text-white -->
            <div class=" text-center text-white ">
                <h1 style="max-width: 760px;" class="ml-auto mr-auto" data-aos="fade-right"><?php the_field('page_interna_titulo'); ?></h1>
                <p style="max-width: 841px; letter-spacing: .2px; line-height: 42px;" data-aos="fade-left" class="text-caption ml-auto mr-auto">
                    <?php the_field('page_interna_desc'); ?></p>
            </div>
        </div>
    <?php endwhile;
    wp_reset_postdata(); ?>
</section>

<section id="releases-todos">
    <div class="container">
        <div class="text-center my-5">
            <img src="<?php bloginfo('template_url'); ?>/img/release-icon.png" alt="">
            <h2 class="text-orange display-h2">Confira as últimas releases</h2>
            <p style="max-width: 640px;" class="text-gray m-auto">Fique por dentro de cada atualização.</p>
        </div>
        <div class="d-flex justify-content-center">
            <p class="font-weight-bold mr-2 mt-1 text-gray-4">Filtre sua exibição</p>
            <select style="width: 25%; color: #EA6724;" class="custom-select" id="loadPerCategory">
                <option value="">Selecione</option>
                <option value="">2019</option>
                <option value="">2020</option>
            </select>
            
        </div>
        <div style="margin-top: 72px;" class="text-center">
            <p style="max-width: 640px;" class="text-gray m-auto"><small>20/03/2020</small></p>

            <h3>Últimas atualizações</h3>
        </div>


    </div>
</section>


<section id="product-todos">
    <div class="container">
        <div class="text-center my-5">
            <img src="<?php bloginfo('template_url'); ?>/img/paper.png" alt="">
            <h2 class="text-orange display-h2">Novidades</h2>
            <p style="max-width: 640px;" class="text-gray m-auto">Fique por dentro do que está acontecendo e deixe seu comentário.</p>
        </div>

        <div class="d-flex justify-content-center">
            <p class="font-weight-bold mr-2 mt-1 text-gray-4">Filtre sua exibição</p>
            <select style="width: 25%; color: #EA6724;" class="custom-select" id="loadPerCategory">
                <option value="">Selecione</option>
                <?php
                $categoria_lista = get_categories(
                    array(
                        'parent' => 0
                    )
                );
                foreach ($categoria_lista as $category): ?>
                    <option value="<?php echo $category->slug; ?>"><?php echo $category->name; ?></option>
                <?php endforeach; ?>
            </select>

        </div>

        <div style="height: 0px;" class="container">
            <div class="mb-5 pb-3" id="parallax-detalhe-1">
                <div data-depth="0.2" class="d-flex justify-content-between">
                    <div class="trace-detail-left">
                    </div>
                    <div style="z-index: 1;" class="trace-detail-right trace-detail-offset-bottom">
                        <img class="" src="<?php bloginfo('template_url'); ?>/img/detalhes-traco-azul.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="loadNews"></div>

        <div style="height: 0px;" class="container">
            <div class="mb-5 pb-3" id="parallax-detalhe-2">
                <div data-depth="0.2" class="d-flex justify-content-between">
                    <div style="z-index: 1;" class="trace-detail-left trace-detail-offset-bottom">
                        <img class="" src="<?php bloginfo('template_url'); ?>/img/detalhes-pontos-laranja.png" alt="">
                    </div>
                    <div class="trace-detail-right">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div data-aos="flip-left" class="col-md-12 text-center mt-4">
                    <button style="padding: 11px 52px;" class="btn btn-outline-light px-5" data-pagina="1" data-categoria="" id="btnLoadNews">
                        Mostrar mais
                    </button>
                </div>
            </div>
        </div>


        <div class="pt-5" id="parallax-hand-1">
            <div data-depth="0" class="d-flex justify-content-center mb-auto">
                <img src="<?php bloginfo('template_url'); ?>/img/person-cut.png" alt="">
            </div>
        </div>


    </div>

</section>
<?php include "footer-nav.php"; ?>

<?php get_footer(); ?>
