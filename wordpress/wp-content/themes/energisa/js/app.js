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


    // ########################################### CARREGAR DESIGNER DO PRODUTO EM MODAL ###############################################

    function designerProdutoAjax(id_post, indice) {
        $.ajax({
            url: wp.ajaxurl,
            type: 'GET',
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

                    str += '<div class="modal-dialog modal-lg" role="document">';
                    str += '<div class="modal-content modal-blue">';
                    str += '<div class="modal-header d-flex justify-content-end pb-0">';
                    str += '<button type="button" class="btn btn-light btn-round py-1" data-dismiss="modal" aria-label="Close">';
                    str += '<span class="text-gray" aria-hidden="true">&times;</span>';
                    str += '</button>';
                    str += '</div>';
                    str += '<div class="modal-body pt-0">';
                    str += '<div class="text-center my-2 mx-5 px-5">';
                    str += '<img src="' + wp.template_url + '/img/jigsaw.png" alt="">';
                    str += '<p class="text-white text-modal-title font-weight-bold">Um pouco sobre o processo</p>';
                    str += '<p class="text-white font-weight-light">' + detalhes[indice].processo + '</p>';
                    str += '<div class="d-flex justify-content-end my-4 mr-5 pr-5">';
                    str += '<a href="#design-produto-slider" role="button" data-slide="prev" class="btn btn-light btn-round mx-2">';
                    str += '<span class="icon pt-2 pb-2 pl-1 icon-prev-icon"></span>';
                    str += '</a>';
                    str += '<a href="#design-produto-slider" role="button" data-slide="next" class="btn btn-light btn-round mx-2">';
                    str += '<span class="icon pt-2 pb-2 pr-1 icon-next-icon"></span>';
                    str += '</a>';
                    str += '</div>';
                    str += '</div>';
                    str += '<div class="container-fluid">';
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
                        str += '</div>';
                        str += '</div>';
                        str += '</div>';
                    }

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
            type: 'GET',
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
            type: 'GET',
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
            type: 'GET',
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


    $("#btn-logar").on('click', function (event) {
        alert("Faça login para votar")
    })

})