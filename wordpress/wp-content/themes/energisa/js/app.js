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


    function equipeDetalhesAjax(indice) {
        $.ajax({
            url: wp.ajaxurl,
            type: 'GET',
            data: {
                action: 'equipeDetalhes',
                indice: indice
            },
            beforeSend: function () {

            },
            success: function (dados) {
                let success = dados.success;
                let detalhes = dados.data;

                if (success) {
                    $("#equipeModal").html(`
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div style="background-image: linear-gradient(0deg, rgba(67, 67, 67, 0.6), rgba(67, 67, 67, 0.6)), url(${detalhes.foto})" class="modal-header d-flex justify-content-end bg-header">
            <button type="button" class="btn btn-light btn-round py-1" data-dismiss="modal" aria-label="Close">
                <span class="text-gray" aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body p-5 m-4">
            <div class="text-start my-2">
                <h3 class=" font-weight-bold">Bio</h3>
                <p class=" font-weight-light text-caption">${detalhes.biografica}</p>
            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>`);
                    $("#equipeModal").modal('show');
                }
            },
            error: function (erro) {
                console.log("ooopss... algo deu errado na requisição")
            },
        })
    }


    $(".mdEquipe").on('click', function (event) {
        event.preventDefault();
        var indice = $(this).data("indice");
        equipeDetalhesAjax(indice);
    })


    // ########################################### CARREGAR DETALHES DO TREINAMENTO NO MODAL ###############


    function treinamentoDetalhesAjax(id_post) {
        $.ajax({
            url: wp.ajaxurl,
            type: 'GET',
            data: {
                action: 'treinamentoDetalhes',
                indice: id_post
            },
            beforeSend: function () {

            },
            success: function (dados) {
                let success = dados.success;
                let detalhes = dados.data;

                if (success) {
                    $("#OQueFazemosModal").html(`
 <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div style="background-image: linear-gradient(0deg, rgba(67, 67, 67, 0.6), rgba(67, 67, 67, 0.6)), url( ${detalhes.capa});" class=" p-4  bg-header">
            <button type="button" class="btn btn-light btn-round py-1 float-right" data-dismiss="modal" aria-label="Close">
                <span class="text-gray" aria-hidden="true">&times;</span>
            </button>
            <h2 style="max-width: 590px;" class="text-white font-weight-bold mx-5 mt-5">${detalhes.titulo}</h2>
            <p class="text-uppercase ml-5">
                <small class="font-weight-bold modal-tag py-1 px-3">treinamento</small>
            </p>

        </div>
        <div class="modal-body p-5 m-4">
            <div class="text-start my-2">
                <h3 class=" font-weight-bold mb-5">Confira como foi</h3>
            ${detalhes.conteudo}
            </div>
        </div>
        <div class="modal-footer">
           
        </div>
    </div>
</div>
                    `);
                    $("#OQueFazemosModal").modal('show');
                }
            },
            error: function (erro) {
                console.log("ooopss... algo deu errado na requisição")
            },
        })
    }


    $(".openTreinamento").on('click', function (event) {
        event.preventDefault();
        var id_post = $(this).data("post");
        treinamentoDetalhesAjax(id_post);
    })


    // ########################################### CARREGAR IDEIAS ###############################################

    function listarIdeiasAjax(page, tipo, status) {
        $.ajax({
            url: wp.ajaxurl,
            type: 'GET',
            data: {
                action: 'listarIdeias',
                page: page,
                tipo: tipo,
                status: status
            },
            beforeSend: function () {

            },
            success: function (dados) {
                let success = dados.success;
                let posts = dados.data.posts;
                let hasNext = dados.data.hasNext;

                if (success) {
                    $.each(posts, function (i, post) {
                        var tags = post.tags;
                        var card = "";

                        card += "<div data-aos='flip-left' class='mb-2 p-2'>";
                        card += "<div class='pb-4 text-start'>";
                        card += "<div class='d-flex justify-content-start pb-4'>";
                        card += "<div class='profile-pic mr-4' style='background-image: url(" + post.foto + ");background-size: cover;background-position: center;'></div>";
                        card += "<div>";
                        card += "<span class='text-fade'><small>Postado " + post.data + "</small></span>";
                        card += "<p class='card-user-name m-0'>" + post.user + "</p>";
                        card += "</div>";
                        card += "</div>";
                        card += "<p class='text-uppercase'>";
                        card += "<small class='text-orange'>" + post.status + "</small>";
                        card += "</p>";
                        card += "<a href='" + post.url + "'>";
                        card += "<p class='font-weight-extra-bold text-caption'>" + post.titulo + "</p>";
                        card += "</a>";
                        card += "<p>";
                        card += "<small>";
                        if (post.votos != "") {
                            card += "<span class='round-outline-text py-1 px-2 mx-1'>" + post.votos + " Votos</span>";
                        }
                        card += "<span class='round-outline-text py-1 px-2 mx-1'>3 Respostas</span>";
                        card += "</small>";
                        card += "</p>";
                        card += "<div class='card-tags'>";
                        for (var i = 0; i < tags.length; i++) {
                            card += "<small class='orange-outline-text py-1 px-2 mr-2 my-1'>#" + tags[i] + "</small>";
                        }
                        card += "</div>";
                        card += "</div>";
                        card += "</div>";
                        card += "<hr>";


                        $("#loadIdeias").append(card);
                    })

                    if (hasNext === false) {
                        $("#btnLoadIdeias").hide();
                    }
                } else {
                    $("#loadIdeias").append(`<div class="alert alert-danger text-center">${dados.data.msg}</div>`);
                }
            },
            error: function (erro) {
                console.log("ooopss... algo deu errado na requisição")
            },
        })
    }

    listarIdeiasAjax(page);

    // Botão de carregar mais
    $("#btnLoadIdeias").on('click', function (event) {
        paggina = $(this).data("pagina") + 1;
        var tipo = $(this).data("tipo");

        if (tipo == "votacao" || tipo == "analise" || tipo == "concluido") {
            listarIdeiasAjax(paggina, '', tipo)
        } else {
            listarIdeiasAjax(paggina, tipo)
        }

        $(this).data('pagina', paggina);

    })

    // Carrega posr tags
    $("body").on('click', '.loadTags', function (event) {
        event.preventDefault();
        var tag = $(this).data("tag");
        $("#loadIdeias").html('');

        listarIdeiasAjax(1, tag)

        $("#btnLoadIdeias").show();
        $("#btnLoadIdeias").data('tipo', tag)
        $("#btnLoadIdeias").data('pagina', 1)

    })

    // Carrega por status
    $(".loadStatus").on('click', function (event) {
        event.preventDefault();
        var status = $(this).data("status");
        $("#loadIdeias").html('');

        listarIdeiasAjax(1, '', status)

        $("#btnLoadIdeias").show();
        $("#btnLoadIdeias").data('tipo', status)
        $("#btnLoadIdeias").data('pagina', 1)

    })

    // ########################################### CARREGAR TAGS ###############################################

    function listarTagsAjax(page) {
        $.ajax({
            url: wp.ajaxurl,
            type: 'GET',
            data: {
                action: 'listarTags',
                page: page,
                pagesize: 4,
            },
            beforeSend: function () {

            },
            success: function (dados) {
                let success = dados.success;
                let tags = dados.data.tags;
                let hasNext = dados.data.hasNext;

                if (success) {
                    $.each(tags, function (i, tag) {
                        $("#loadTags").append(`<a class="text-gray btn p-0 mb-3 loadTags" href="#" data-tag="${tag.slug}">#${tag.name} (${tag.count})</a><br>`);
                    })

                    if (hasNext === false) {
                        $("#btnLoadTags").hide();
                    }
                }
            },
            error: function (erro) {
                console.log("ooopss... algo deu errado na requisição")
            },
        })
    }

    listarTagsAjax(page)

    // Carrega mais Tags
    $("#btnLoadTags").on('click', function (event) {
        event.preventDefault();
        paggina = $(this).data("pagina");
        listarTagsAjax(paggina + 1)
        $(this).data('pagina', paggina + 1);
    })

})