<?php get_header(); /* Template Name: Painel */ ?>
<section id="product-banner">
    <div style="
            background: linear-gradient(0deg, rgba(8, 155, 192, 0.7), rgba(8, 155, 192, 0.7)), url(<?php bloginfo('template_url'); ?>/img/novidades-header.png);
            background-size: cover;
            background-position: center;
            background-blend-mode: multiply, normal;
            " class="container-fluid   product-banner-holder px-0 ">
        <!-- text-white -->
        <div class="product-banner text-center text-white ">
            <h2 data-aos="fade-right">Painel</h2>
            <p>Minha lista de ideias</p>
        </div>
    </div>
</section>


<section id="product-todos">
    <div class="container">
        <div class="row mt-5">
            <?php while (have_posts()) : the_post(); ?>
                <?php
                if (is_user_logged_in()):?>
                    <?php include(TEMPLATEPATH . '/inc/painel.php'); ?>

                    <?php $args = array(
                        'post_type' => 'ideias',
                        'post_status' => array(
                            'publish',
                            'draft'
                        ),
                        'author' => get_current_user_id()
                    );

                    $myIdeias = new WP_Query($args);
                    if ($myIdeias->have_posts()) :
                        ?>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ideia</th>
                                <th scope="col">Data</th>
                                <th scope="col">Votos</th>
                                <th scope="col">Respostas</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $contador = 1;
                            while ($myIdeias->have_posts()):
                                $myIdeias->the_post();
                                $status_field = get_field('ideia_status');
                                $votos = get_field('ideia_votos');
                                if ($votos == "") {
                                    $votos = 0;
                                }
                                $classbadges = "";

                                switch ($status_field['value']) {
                                    case "concluido":
                                        $classbadges = "badge-success";
                                        break;
                                    case "analise":
                                        $classbadges = "badge-warning";
                                        break;
                                    case "votacao":
                                        $classbadges = "badge-info";
                                        break;
                                    default:
                                        $classbadges = "badge-danger";
                                }
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $contador; ?></th>
                                    <td>
                                        <a href="<?php the_permalink(); ?>" class="btn btn-link" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                    </td>
                                    <td><?php echo get_the_date('d/m/Y', get_the_ID()); ?></td>
                                    <td><?php echo $votos ?></td>
                                    <td><?php echo get_comments_number(get_the_ID()); ?></td>
                                    <td>
                                        <span class="badge <?php echo $classbadges; ?>"><?php echo $status_field['label'] == "" ? "Aguardando aprovação" : $status_field['label']; ?></span>
                                    </td>
                                </tr>
                                <?php $contador++; ?>
                            <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible text-center fade show" role="alert">
                                Você ainda não enviou nenhuma ideia :(
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>

                <?php else: ?>
                    <script type="text/javascript">
                        window.location.href = "http://energisa.digital";
                    </script>
                <?php endif;
                ?>


            <?php endwhile; ?>
        </div>

        <div class="pt-5" id="parallax-hand-1">
            <div data-depth="0.5" class="d-flex justify-content-center mb-auto">
                <img src="<?php bloginfo('template_url'); ?>/img/person-cut.png" alt="">
            </div>
        </div>

    </div>

</section>
<?php include "footer-nav.php"; ?>

<?php get_footer(); ?>

