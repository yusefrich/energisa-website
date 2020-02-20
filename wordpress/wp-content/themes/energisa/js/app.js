jQuery(function ($) {

    var page = 1;

    function listarNovidadesAjax(page) {
        $.ajax({
            url: wp.ajaxurl,
            type: 'GET',
            data: {
                action: 'listarNovidades',
                page: page
            },
            beforeSend: function () {

            },
            success: function (dados) {
                let success = dados.success;
                let posts = dados.data.posts;
                let hasNext = dados.data.hasNext;

                if (success) {
                    $.each(posts, function (i, post) {
                        $("#loadNews").append(`
<div data-aos="fade-right" class="col-md-4 text-center my-3 px-2">
    <a href="${post.url}">
        <img src="${post.capa}" class="figure-img img-fluid rounded zoom-hover" alt="img">
    </a>
    <a href="${post.url}">
        <p class="img-caption  text-uppercase">
            <small>postado em <strong>${post.data}</strong></small>
        </p>
    </a>
    <a href="${post.url}">
        <p class="font-weight-bold">${post.titulo}</p>
    </a>
    <a href="${post.url}">
        <p class="font-weight-light">${post.descricao}</p>
    </a>
</div>
                        `)
                    })

                    if (hasNext === false) {
                        $("#btnLoadNews").remove();
                    }
                } else {
                    $("#loadNews").append(`<div class="alert alert-danger text-center">${dados.data.msg}</div>`);
                }
            },
            error: function (erro) {
                console.log("ooopss... algo deu errado na requisição")
            },
        })
    }

    listarNovidadesAjax(page)

    // Carregar posts novidades
    $("#btnLoadNews").on('click', function () {
        paggina = $(this).data("pagina");
        listarNovidadesAjax(paggina + 1)
        $(this).data('pagina', paggina + 1);
    })

    // ########################################################## CARREGAR PROJETOS ##########################################

    function listarProjetosAjax(page) {
        $.ajax({
            url: wp.ajaxurl,
            type: 'GET',
            data: {
                action: 'listarProjetos',
                page: page
            },
            beforeSend: function () {

            },
            success: function (dados) {
                let success = dados.success;
                let posts = dados.data.posts;
                let hasNext = dados.data.hasNext;

                if (success) {
                    $.each(posts, function (i, post) {
                        $("#loadProjects").append(`
<div data-aos="flip-left" class="col-md-4">
    <div class="card card-bg-small text-white mb-2 zoom-hover card-link-div" onclick="window.location='${post.url}';">
        <div class="img-holder-sm" style="
                                background: linear-gradient(0deg, rgba(${post.bg_color}), rgba(${post.bg_color})), url(${post.capa});
                                background-position: center;
                                background-size: cover;">
            <a href="${post.url}" class="btn btn-light btn-round btn-sm card-btn m-3">
                <span class="icon pt-2 pb-2 pr-2 icon-next-icon"></span></a>
            <div class="card-img-overlay overlay-sm text-start">
                <a href="${post.url}">
                    <h3 class="card-title">${post.titulo}</h3>
                </a>
                <a href="${post.url}">
                    <p class="card-text">
                       ${post.descricao}
                    </p>
                </a>
                <div class="overlay-status">
                    <small class="pl-3">STATUS</small>
                    <br>
                    <small class="outline-text py-1 px-3 text-uppercase">${post.status}</small>
                </div>
            </div>
        </div>
    </div>
</div>`)
                    })

                    if (hasNext === false) {
                        $("#btnLoadProjects").remove();
                    }
                } else {
                    $("#loadProjects").append(`<div class="alert alert-danger text-center">${dados.data.msg}</div>`);
                }
            },
            error: function (erro) {
                console.log("ooopss... algo deu errado na requisição")
            },
        })
    }

    listarProjetosAjax(page)


    $("#btnLoadProjects").on('click', function () {
        paggina = $(this).data("pagina");
        listarProjetosAjax(paggina + 1)
        $(this).data('pagina', paggina + 1);
    })


    // ########################################################## CARREGAR PRODUTOS ##########################################

    function listarProdutosAjax(page) {
        $.ajax({
            url: wp.ajaxurl,
            type: 'GET',
            data: {
                action: 'listarProdutos',
                page: page
            },
            beforeSend: function () {

            },
            success: function (dados) {
                let success = dados.success;
                let posts = dados.data.posts;
                let hasNext = dados.data.hasNext;

                if (success) {
                    $.each(posts, function (i, post) {
                        $("#loadProducts").append(`
<div data-aos="flip-left" class="col-md-4">
    <div class="card card-bg-small text-white mb-2 zoom-hover card-link-div" onclick="window.location='${post.url}';">
        <div class="img-holder-sm" style="
                                background: linear-gradient(0deg, rgba(${post.bg_color}), rgba(${post.bg_color})), url(${post.capa});
                                background-position: center;
                                background-size: cover;">
            <a href="${post.url}" class="btn btn-light btn-round btn-sm card-btn m-3">
                <span class="icon pt-2 pb-2 pr-2 icon-next-icon"></span></a>
            <div class="card-img-overlay overlay-sm text-start">
                <a href="${post.url}">
                    <h3 class="card-title">${post.titulo}</h3>
                </a>
                <a href="${post.url}">
                    <p class="card-text">
                       ${post.descricao}
                    </p>
                </a>
               </div>
        </div>
    </div>
</div>`)
                    })

                    if (hasNext === false) {
                        $("#btnLoadProducts").remove();
                    }
                } else {
                    $("#loadProducts").append(`<div class="alert alert-danger text-center">${dados.data.msg}</div>`);
                }
            },
            error: function (erro) {
                console.log("ooopss... algo deu errado na requisição")
            },
        })
    }

    listarProdutosAjax(page)

    $("#btnLoadProducts").on('click', function () {
        paggina = $(this).data("pagina");
        listarProdutosAjax(paggina + 1)
        $(this).data('pagina', paggina + 1);
    })

    // ########################################################## CARREGAR DETALHES DA EQUIPE NO MODAL ##########################################
    $(".mdEquipe").on('click', function () {
        var indice = $(this).data("indice");
        //listarProdutosAjax(paggina + 1)
        alert(indice)
    })


})