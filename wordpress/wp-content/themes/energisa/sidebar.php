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

        <?php
        function get_post_count_by_meta($meta_key, $meta_value, $post_type)
        {
            $args = array(
                'post_type' => $post_type,
                'numberposts' => -1,
                'post_status' => 'publish',
            );

            if ($meta_key && $meta_value) {
                if (is_array($meta_value)) {
                    $args['meta_query'][] = array(
                        'key' => $meta_key,
                        'value' => $meta_value,
                        'compare' => 'LIKE'
                    );
                } else {
                    $args['meta_query'][] = array('key' => $meta_key, 'value' => $meta_value);
                }
            }
            $posts = get_posts($args);
            $count = count($posts);
            return $count;
        }

        $count_analise = get_post_count_by_meta('ideia_status', 'analise', 'ideias');
        $count_votacao = get_post_count_by_meta('ideia_status', 'votacao', 'ideias');
        $count_concluido = get_post_count_by_meta('ideia_status', 'concluido', 'ideias');

        echo "<a class=\"text-gray btn p-0 mb-3 loadStatus\" href=\"#\" data-status=\"analise\">Em análise (" . $count_analise . ")</a><br>";
        echo "<a class=\"text-gray btn p-0 mb-3 loadStatus\" href=\"#\" data-status=\"votacao\">Em Votação (" . $count_votacao . ")</a><br>";
        echo "<a class=\"text-gray btn p-0 mb-3 loadStatus\" href=\"#\" data-status=\"concluido\">Concluído (" . $count_concluido . ")</a><br>";

        ?>
        <!-- <a class="text-gray btn p-0 mb-3" href="#">Mais votados (14)</a><br>-->
    </div>
    <div class="card-outline mt-4 p-4">
        <p class="text-caption font-weight-bold">Tags</p>
        <div id="loadTags"></div>
        <?php
        $tags = get_tags([
            'hide_empty' => true,
            'orderby' => 'count',
            'order' => 'DESC',
            'number' => 0,
        ]);

        foreach ($tags as $tag) {
            //echo "<a class=\"text-gray btn p-0 mb-3 loadTags\" href=\"#\" data-tag='$tag->slug'>#$tag->name  ($tag->count)</a><br>";
        }

        ?>
          <button class="btn btn-sm px-5 text-gray" id="btnLoadTags" data-pagina="1"><strong> Mostrar mais</strong></button>

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