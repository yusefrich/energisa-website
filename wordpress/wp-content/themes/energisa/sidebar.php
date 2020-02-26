<div class="col-md-3">
    <!--<p class="text-caption font-weight-bold">Filtre por produto</p>
    <select class="custom-select">
        <option selected>Todos</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>-->
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
        <button class="btn btn-sm px-5 text-gray" id="btnLoadTags" data-pagina="1"><strong> Mostrar mais</strong>
        </button>

    </div>

    <div class="card-outline mt-4 mb-4 p-4">
        <p class="text-caption font-weight-bold">Quem mais participa</p>
        <div id="loadUserComments"></div>
        <button class="btn btn-sm px-5 text-gray" data-indice="0" id="BtnLoadUserComments"><strong> Mostrar mais</strong></button>
    </div>

</div>