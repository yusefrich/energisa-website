jQuery(function ($) {

    var page = 1;

    function listarNovidadesAjax(page, categoriaSlug) {
        $.ajax({
            url: wp.ajaxurl,
            type: 'POST',
            data: {
                action: 'listarNovidades',
                page: page,
                categoria: categoriaSlug
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
            <small><span class="text-gray-3">postado em</span> <strong>${post.data}</strong></small>
        </p>
    </a>
    <a href="${post.url}">
        <p style="max-width: 378px;" class="font-weight-bold text-caption-size">${post.titulo}</p>
    </a>
    <a href="${post.url}">
        <p class="font-weight-regular text-gray-3">${post.descricao}</p>
    </a>
</div>
                        `)
                    })

                    if (hasNext === false) {
                        $("#btnLoadNews").addClass('d-none');
                    }
                } else {
                    $("#loadNews").append(`<div class="alert alert-danger text-center posts-end-alert">${dados.data.msg}</div>`);
                }
            },
            error: function (erro) {
                console.log("ooopss... algo deu errado na requisição")
            },
        })
    }

    listarNovidadesAjax(page, '')

    // Carregar posts novidades
    $("#btnLoadNews").on('click', function () {
        paggina = $(this).data("pagina");
        let categoria = $(this).data("categoria");

        listarNovidadesAjax(paggina + 1, categoria)
        $(this).data('pagina', paggina + 1);
    })

    // Carregar posts novidades por categoria
    $("#loadPerCategory").on('change', function () {
        let categorySlug = $(this).val();

        $("#loadNews").html('');
        $("#btnLoadNews").removeClass('d-none');
        listarNovidadesAjax(1, categorySlug)
        $("#btnLoadNews").data('pagina', 1);
        $("#btnLoadNews").data('categoria', categorySlug);
    })

    // ########################################################## CARREGAR PROJETOS ##########################################

    function listarProjetosAjax(page) {
        $.ajax({
            url: wp.ajaxurl,
            type: 'POST',
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
                                background-image: url(${post.capa});
                                background-color: rgba(${post.bg_color});
                                background-blend-mode: multiply;
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
                    $("#loadProjects").append(`<div class="alert alert-danger text-center posts-end-alert">${dados.data.msg}</div>`);
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
            type: 'POST',
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
                                background-image: url(${post.capa});
                                background-color: rgba(${post.bg_color});
                                background-blend-mode: multiply;
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
                    $("#loadProducts").append(`<div class="alert alert-danger text-center posts-end-alert">${dados.data.msg}</div>`);
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
            type: 'POST',
            data: {
                action: 'equipeDetalhes',
                indice: indice
            },
            beforeSend: function () {

            },
            success: function (dados) {
                let success = dados.success;
                let detalhes = dados.data;
                console.log(detalhes);

                if (success) {
                    $("#equipeModal").html(`
<div class="modal-dialog modal-lg" role="document">
    <div style="border-radius: 6px" class="modal-content">
        <div class="d-none d-md-block  modal-body p-0">
            <div class="row m-0">
                <div style="border-radius: 6px;
                        background-image: linear-gradient(0deg, rgba(67, 67, 67, 0.6), rgba(67, 67, 67, 0.6)), url(${detalhes.foto});
                        background-position: center;
                        background-size: cover;
                        height: 500px;" class="col-5">
                        <div style="bottom: 0;
                                    position: absolute;
                                    left: 0;
                                    right: 0;" class="text-center">
                            <h3 class="text-white">${detalhes.nome}</h3>
                            <p class="text-white">${detalhes.cargo}</p>
                        </div>
                </div>
                <div class="col-7">
                    <button style="margin-top: 24px" type="button" class="btn btn-primary btn-round py-1 float-right" data-dismiss="modal" aria-label="Close">
                        <span class="text-white" aria-hidden="true">&times;</span>
                    </button>
                    <div style="padding: 29px 46px;">
    
                        <h3 class=" font-weight-bold">Bio</h3>
                        <p style="font-size: 16px; line-height: 28px;" class=" font-weight-light text-caption">${detalhes.biografica}</p>
                    </div>
                </div>
            </div>
        </div>
        <div style="background-image: linear-gradient(0deg, rgba(67, 67, 67, 0.6), rgba(67, 67, 67, 0.6)), url(${detalhes.foto})" class="d-md-none modal-header d-flex justify-content-end bg-header">
            <button type="button" class="btn btn-light btn-round py-1" data-dismiss="modal" aria-label="Close">
                <span class="text-gray" aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="d-md-none modal-body p-5 m-4">
            <div class="text-start my-2">
                <h3 class=" font-weight-bold">Bio</h3>
                <p class=" font-weight-light text-caption">${detalhes.biografica}</p>
            </div>
        </div>
        <div class="d-md-none modal-footer">
        </div>
    </div>
</div>
`);
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
            type: 'POST',
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
            type: 'POST',
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
                        let votos = parseInt(post.votos);
                        if (isNaN(votos)) {
                            votos = 0;
                        }
                        let respostas = parseInt(post.respostas);
                        if (isNaN(respostas)) {
                            respostas = 0;
                        }
                        var card = "";

                        card += "<div data-aos='flip-left' class='mb-2 p-2'>";
                        card += "<div class='pb-4 text-start'>";
                        card += "<div class='d-flex justify-content-start pb-4'>";
                        card += "<div class='profile-pic mr-4' style='background-image: url(" + post.foto + ");background-size: cover;background-position: center;'></div>";
                        card += "<div>";
                        card += "<span class='text-fade'><small>Postado em " + post.data + "</small></span>";
                        card += "<p class='card-user-name m-0'>" + post.user + "</p>";
                        card += "</div>";
                        card += "</div>";
                        card += "<p class='text-uppercase'>";
                        if(post.status == "Em votação")
                            card += "<small class='text-orange badge-orange'>" + post.status + "</small>";
                        if(post.status == "Em análise")
                            card += "<small class='text-orange badge-blue'>" + post.status + "</small>";
                        if(post.status == "Concluído")
                            card += "<small class='text-orange badge-green'>" + post.status + "</small>";
                        card += "</p>";
                        card += "<a href='" + post.url + "'>";
                        card += "<p class='font-weight-extra-bold text-caption'>" + post.titulo + "</p>";
                        card += "</a>";
                        card += "<p>";
                        card += "<small>";
                        if (votos > 1) {
                            card += "<span class='round-outline-text py-1 px-2 mx-1'>" + votos + " Votos</span>";
                        } else {
                            card += "<span class='round-outline-text py-1 px-2 mx-1'>" + votos + " Voto</span>";
                        }
                        if (respostas > 1) {
                            card += "<span class='round-outline-text py-1 px-2 mx-1'>" + respostas + " Respostas</span>";
                        } else {
                            card += "<span class='round-outline-text py-1 px-2 mx-1'>" + respostas + " Resposta</span>";
                        }
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
                    $("#loadIdeias").append(`<div class="alert alert-danger text-center posts-end-alert">${dados.data.msg}</div>`);
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
            type: 'POST',
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


    // ########################################### CARREGAR DESIGNER DO PRODUTO EM MODAL ###############################################

    function designerProdutoAjax(id_post, indice) {
        $.ajax({
            url: wp.ajaxurl,
            type: 'POST',
            data: {
                action: 'designerProduto',
                id_post: id_post
            },
            beforeSend: function () {

            },
            success: function (dados) {
                let success = dados.success;
                let detalhes = dados.data;
                let images = detalhes[indice].images
                var str = "";


                if (success) {

                    str += '<div class="modal-dialog modal-full" role="document">';
                    str += '<div class="modal-content modal-blue">';
                    str += '<div class="modal-header d-flex justify-content-end pb-0">';
                    str += '<button type="button" class="btn btn-light btn-round py-1" data-dismiss="modal" aria-label="Close">';
                    str += '<span class="text-gray" aria-hidden="true">&times;</span>';
                    str += '</button>';
                    str += '</div>';
                    str += '<div class="modal-body pt-0">';
                    str += '<div class="row absolute-vertical-center">';
                    str += '<div class="col-md-5 p-0">';
                    str += '<div class="text-start my-2 mx-3">';/* mx-5 px-5 */
                    str += '<div class="d-flex justify-content-start">';
                    str += '<img src="' + wp.template_url + '/img/jigsaw.png" alt="">';
                    str += '<h2 class="text-white font-weight-bold">Um pouco sobre o processo</h2>';
                    str += '</div>';
                    str += '<p class="text-white font-weight-light mt-4">' + detalhes[indice].processo + '</p>';
                    str += '</div>';
                    str += '</div>';
                    str += '<div class="col-md-7 p-0">';

                    str += '<div class="container-fluid p-0">';
                    str += '<div id="design-produto-slider" class="carouselPrograms carousel slide" data-ride="carousel" data-interval="false">';
                    str += '<div class="carousel-inner design-produto-iner row w-100 mx-auto" role="listbox">';

                    for (var i = 0; i < images.length; i++) {
                        if (i == 0) {
                            str += '<div class="carousel-item col-md-4  active">';
                        } else {
                            str += '<div class="carousel-item col-md-4">';
                        }
                        str += '<div class="panel panel-default">';
                        str += '<div class="panel-thumbnail">';
                        str += '<a href="#" title="image ' + i + '" class="thumb">';
                        str += '<img class="mx-auto d-block img-fit rounded" src="' + images[i] + '" alt="slide ' + i + '">';
                        str += '</a>';
                        /* str += '<p class="text-white">Descrição da imagem</p>'; */
                        str += '</div>';
                        str += '</div>';
                        str += '</div>';
                    }

                    str += '</div>';
                    str += '</div>';
                    str += '</div>';
                    str += '<div class="d-flex justify-content-end my-4 mr-5 pr-5">';
                    str += '<a href="#design-produto-slider" role="button" data-slide="prev" class="btn btn-light btn-round mx-2">';
                    str += '<span class="icon pt-2 pb-2 pl-1 icon-prev-icon"></span>';
                    str += '</a>';
                    str += '<a href="#design-produto-slider" role="button" data-slide="next" class="btn btn-light btn-round mx-2">';
                    str += '<span class="icon pt-2 pb-2 pr-1 icon-next-icon"></span>';
                    str += '</a>';
                    str += '</div>';

                    str += '</div>';

                    str += '</div>';
                    str += '</div>';
                    str += '<div class="modal-footer"></div>';
                    str += '</div>';
                    str += '</div>';


                    $("#designProdutoModal").html(str);

                    $("#designProdutoModal").modal('show');
                }
            },
            error: function (erro) {
                console.log("ooopss... algo deu errado na requisição")
            },
        })
    }


    $(".openDesignerProduto").on('click', function (event) {
        event.preventDefault();
        var id_post = $(this).data("post");
        var indice = $(this).data("indice");
        designerProdutoAjax(id_post, indice);
    })


    // ########################################### CARREGAR USUÁRIOS QUE MAIS COMETARAM ###############################################

    function listUserComments(indice) {
        $.ajax({
            url: wp.ajaxurl,
            type: 'POST',
            data: {
                action: 'listUserComments',
            },
            beforeSend: function () {

            },
            success: function (dados) {
                let success = dados.success;
                let total = dados.data.total;
                let item = dados.data.itens;
                var str = '';

                if (success) {
                    str += '<div class="d-flex justify-content-start py-2">';
                    str += '<div class="profile-pic pr-5 mr-1" style="background-image: url(' + item[indice].foto + ');background-size: cover;background-position: center;"></div>';
                    str += '<div><p class="card-user-name m-0">' + item[indice].nome + '</p></div>';
                    str += '</div>';
                    str += '<hr>';

                    $("#loadUserComments").append(str);


                    if (total == (indice + 1)) {
                        $("#BtnLoadUserComments").hide();
                    }
                }
            },
            error: function (erro) {
                console.log("ooopss... algo deu errado na requisição")
            },
        })
    }

    listUserComments(0)

    // Carrega mais Tags
    $("#BtnLoadUserComments").on('click', function (event) {
        event.preventDefault();
        indice = $(this).data("indice");
        listUserComments(indice + 1)
        $(this).data('indice', indice + 1);
    })


    // ############################ AÇÃO DO BOTÃO DE VOTAR #################################

    function votarPostAjax(id, tipo) {
        $.ajax({
            url: wp.ajaxurl,
            type: 'POST',
            data: {
                action: 'votarPost',
                postID: id,
                tipo: tipo
            },
            beforeSend: function () {

            },
            success: function (dados) {
                let success = dados.success;
                let votos = dados.data;
                if (success) {
                    if (votos > 1) {
                        $("#qtd-votos").html(votos + ' Votos');
                    } else {
                        $("#qtd-votos").html(votos + ' Voto');
                    }
                }
            },
            error: function (erro) {
                console.log("ooopss... algo deu errado na requisição")
            },
        })
    }


    $("#btn-votar").on('click', function (event) {
        event.preventDefault();
        let postId = $(this).data("postid");
        let tipo = $(this).data("tipo");

        let salvos = localStorage.getItem('likes');

        if (!salvos) {
            localStorage.setItem('likes', postId.toString())
        } else {
            salvos = salvos.split(',');

            let item = $.inArray(postId.toString(), salvos);

            // Verifica se existe o ID do post do array
            if (item == -1) {
                salvos.push(postId.toString())
                localStorage.setItem('likes', salvos)
            }
        }

        if (tipo == 1) {
            votarPostAjax(postId, tipo)
            $(this).removeClass('btn-outline-dark');
            $(this).addClass('btn-success');
            $(this).data('tipo', 0);

        }
    })

    function visitantesVotos() {
        let salvos = localStorage.getItem('likes');
        if (salvos) {
            salvos = salvos.split(',');
            salvos.forEach(function (id) {
                $('[data-postid=' + id + ']#btn-votar').removeClass('btn-outline-dark').addClass('btn-success').data('tipo', 0);
            })
        }
    }

    visitantesVotos();


    // ############################ AÇÃO DO BOTÃO DE CURTIR POST #################################


    function likePostAjax(id, tipo) {
        $.ajax({
            url: wp.ajaxurl,
            type: 'POST',
            data: {
                action: 'likePost',
                postID: id,
                tipo: tipo
            },
            beforeSend: function () {

            },
            success: function (dados) {
                let success = dados.success;
                let likes = dados.data;
                if (success) {
                    console.log(likes);
                    $("#btn-like span").html(`(${likes})`);
                    if (tipo == 1) {
                        $("#btn-like").data('tipo', 2);
                        $("#btn-like").removeClass('btn-outline-dark').addClass('btn-success');
                    } else {
                        $("#btn-like").removeClass('btn-success').addClass('btn-outline-dark');
                        $("#btn-like").data('tipo', 1);
                    }

                }
            },
            error: function (erro) {
                console.log("ooopss... algo deu errado na requisição")
            },
        })
    }

    $("#btn-like").on('click', function (event) {
        event.preventDefault();
        let postId = $(this).data("postid");
        let tipo = $(this).data("tipo");
        likePostAjax(postId, tipo)

        let salvos = localStorage.getItem('post_likes');

        if (!salvos) {
            localStorage.setItem('post_likes', postId.toString())
        } else {
            salvos = salvos.split(',');

            let item = $.inArray(postId.toString(), salvos);

            // Verifica se existe o ID do post do array
            if (item == -1) {
                salvos.push(postId.toString())
            } else {
                salvos.splice(item, 1)
            }
            localStorage.setItem('post_likes', salvos)
        }
    })

    function visitantesLikes() {
        let salvos = localStorage.getItem('post_likes');
        if (salvos) {
            salvos = salvos.split(',');
            salvos.forEach(function (id) {
                $('[data-postid=' + id + ']#btn-like').removeClass('btn-outline-dark').addClass('btn-success').data('tipo', 2);
            })
        }
    }

    visitantesLikes();

    // #############################################################

    $("#btn-logar").on('click', function (event) {
        alert("Faça login para votar")
    })

    $("#wppb-register-user #email").on('blur', function (event) {
        var emailRegExp = /(\w+([-+.']\w+)*@(energisa.com.br))$/;

        if (emailRegExp.test($(this).val())) {

        } else {
            alert("Email inválido");
            $(this).val('');
        }
    })


    // ############################ CARREGAR OS POSTS POR PRODUTO #################################

    function listarPorProdutoAjax(pagina, id) {
        $.ajax({
            url: wp.ajaxurl,
            type: 'POST',
            data: {
                action: 'listarPorProduto',
                id: id,
                page: pagina,
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
                        let votos = parseInt(post.votos);
                        if (isNaN(votos)) {
                            votos = 0;
                        }
                        let respostas = parseInt(post.respostas);
                        if (isNaN(respostas)) {
                            respostas = 0;
                        }
                        var card = "";

                        card += "<div data-aos='flip-left' class='mb-2 p-2'>";
                        card += "<div class='pb-4 text-start'>";
                        card += "<div class='d-flex justify-content-start pb-4'>";
                        card += "<div class='profile-pic mr-4' style='background-image: url(" + post.foto + ");background-size: cover;background-position: center;'></div>";
                        card += "<div>";
                        card += "<span class='text-fade'><small>Postado em " + post.data + "</small></span>";
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
                        if (votos > 1) {
                            card += "<span class='round-outline-text py-1 px-2 mx-1'>" + votos + " Votos</span>";
                        } else {
                            card += "<span class='round-outline-text py-1 px-2 mx-1'>" + votos + " Voto</span>";
                        }
                        if (respostas > 1) {
                            card += "<span class='round-outline-text py-1 px-2 mx-1'>" + respostas + " Respostas</span>";
                        } else {
                            card += "<span class='round-outline-text py-1 px-2 mx-1'>" + respostas + " Resposta</span>";
                        }
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
                        $("#btnLoadIdeias2").hide();
                    }
                } else {
                    $("#loadIdeias").append(`<div class="alert alert-danger text-center posts-end-alert">${dados.data.msg}</div>`);
                }
            },
            error: function (erro) {
                console.log("ooopss... algo deu errado na requisição")
            },
        })
    }

    $("#loadPerProduct").on('change', function () {
        let id = $(this).val();
        $("#loadIdeias").html('');
        listarPorProdutoAjax(1, id);

        $("#btnLoadIdeias").addClass('d-none');

        $("#btnLoadIdeias2").removeClass('d-none');
        $("#btnLoadIdeias2").data('pagina', 1);
        $("#btnLoadIdeias2").data('produto', id);
    })

    // Botão de carregar mais ideias por produto
    $("#btnLoadIdeias2").on('click', function (event) {
        paggina = $(this).data("pagina") + 1;
        var produtoID = $(this).data("produto");
        listarPorProdutoAjax(paggina, produtoID);
        $(this).data('pagina', paggina);
    })

    $("#acf-form label[for='acf-_post_title']").text("Título");
    $("#acf-form label[for='acf-_post_content']").text("Minha Ideia");
    $("#acf-form #wp-acf-editor-32-editor-tools").remove();


    //############################# CARREGA RELEASES ####################################

    var releaseCount = 0;

    function listarReleasesSingle(page) {
        $.ajax({
            url: wp.ajaxurl,
            type: 'POST',
            data: {
                action: 'listarReleasesSingle',
                page: page,
                post_type: wp.post_type,
                postId: wp.post_id,
            },
            success: function (dados) {
                let success = dados.success;
                let hasNext = dados.data.hasNext;
                let releases = dados.data.releases;

                if (success) {
                    $.each(releases, function (i, release) {
                        releaseCount++;
                        var str = "";
                        str += '<li class="in-view">';
                        str += '<div>';
                        if (releaseCount === 1) {
                            str += '<p style="background-color: rgba(' + release.post_color + '); max-width: 220px" class="paragraph text-white font-weight-bold tittle-badge">' + release.post_titulo + '</p><br>';
                        }
                        str += '<time>' + release.release_data + '</time>';
                        str += '<p style="max-width: 230px" class="paragraph-text-small font-weight-bold">' + release.release_titulo + '</p>';
                        str += '<p style="max-width: 234px" class="release-text text-gray-2">' + release.release_descricao;
                        str += '<br>';
                        if (release.release_target == 'interno') {
                            str += '<a style="padding: 7px 37px;" href="' + release.release_url + '" class="btn btn-outline-light px-5 font-weight-600 release-btn">Saiba mais</a>';
                        }
                        if (release.release_target == 'externo') {
                            str += '<a style="padding: 7px 37px;" href="' + release.release_url + '" target="_blank" class="btn btn-outline-light px-5 font-weight-600 release-btn">Acesse nosso site</a>';
                        }
                        str += '</p>';
                        str += '</div>';
                        str += '</li>';
                        $("#loadReleaseSingle").append(str);
                    })
                    if (hasNext === false) {
                        $("#btnLoadReleases").hide();
                    }
                }
            },
            error: function (erro) {
                console.log("ooopss... algo deu errado na requisição")
            },
        })
    }

    if ($("#loadReleaseSingle").length) {
        listarReleasesSingle(page)
    }

    // Carrega mais Releases
    $("#btnLoadReleases").on('click', function (event) {
        event.preventDefault();
        paggina = $(this).data("pagina");
        listarReleasesSingle(paggina + 1)
        $(this).data('pagina', paggina + 1);
    })


    //############################# CARREGA RELEASES EM NOVIDADES ####################################

    function listarReleasesAll(page, ano) {
        $.ajax({
            url: wp.ajaxurl,
            type: 'POST',
            data: {
                action: 'listarReleasesAll',
                page: page,
                ano: ano
            },

            success: function (dados) {
                let success = dados.success;
                let hasNext = dados.data.hasNext;
                let releases = dados.data.releases;
                if (success) {
                    $.each(releases, function (i, release) {
                        releaseCount++;
                        var str = "";
                        if (releaseCount === 1) {
                            str += '<li style="margin-top: 80px"></li>';
                        }
                        str += '<li class="in-view">';
                        str += '<div>';
                        str += '<p style="background-color: rgba(' + release.post_color + '); max-width: 220px" class="paragraph text-white font-weight-bold tittle-badge">' + release.post_titulo + '</p><br>';
                        str += '<time>' + release.release_data + '</time>';
                        str += '<p style="max-width: 230px" class="paragraph-text-small font-weight-bold">' + release.release_titulo + '</p>';
                        str += '<p style="max-width: 234px" class="release-text text-gray-2">' + release.release_descricao;
                        str += '<br>';
                        if (release.release_target == 'interno') {
                            str += '<a style="padding: 7px 37px;" href="' + release.release_url + '" class="btn btn-outline-light px-5 font-weight-600 release-btn">Saiba mais</a>';
                        }
                        if (release.release_target == 'externo') {
                            str += '<a style="padding: 7px 37px;" href="' + release.release_url + '" target="_blank" class="btn btn-outline-light px-5 font-weight-600 release-btn">Saiba mais</a>';
                        }
                        str += '</p>';
                        str += '</div>';
                        str += '</li>';

                        $("#loadReleaseAll").append(str);
                    })

                    if (hasNext === false) {
                        $("#btnLoadReleasesAll").hide();
                    }
                }

            },
            error: function (erro) {
                console.log("ooopss... algo deu errado na requisição")
            },
        })
    }

    listarReleasesAll(page, "")

    // Carrega mais Releases
    $("#btnLoadReleasesAll").on('click', function (event) {
        event.preventDefault();
        paggina = $(this).data("pagina");
        var ano = $(this).data("ano");

        listarReleasesAll(paggina + 1, ano)
        $(this).data('pagina', paggina + 1);
    })

    $("#loadReleaseYars").on('change', function () {
        let ano = $(this).val();
        releaseCount = 0;
        $("#loadReleaseAll").html('');
        listarReleasesAll(1, ano)

        $("#btnLoadReleasesAll").show();
        $("#btnLoadReleasesAll").data('pagina', 1);
        $("#btnLoadReleasesAll").data('ano', ano);
    })

})