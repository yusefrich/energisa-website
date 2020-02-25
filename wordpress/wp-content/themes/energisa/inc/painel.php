<div class="col-md-12 d-flex justify-content-center align-items-center mb-5">
    <a href="<?php the_permalink() ?>/painel" class="btn btn-info ml-3">Painel</a>
    <a href="<?php the_permalink() ?>/submeter" class="btn btn-success ml-3">Enviar ideia</a>
    <a href="<?php the_permalink() ?>/perfil" class="btn btn-primary ml-3">Editar meu perfil</a>
    <a href="<?php echo wp_logout_url(home_url()); ?>" class="btn btn-danger ml-3">Sair</a>
</div>