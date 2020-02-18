jQuery(function ($) {

    /*****************************
     * Listar posts
     *
     * (x) Função PHP
     * () admin-ajax.php
     * () Função JS
     *
     ****************************/
    function listarPostsAjax () {
        $.ajax({
            url: wp.ajaxurl,
            type: 'GET',
            data: {
                action: 'listarPosts'
            },
            beforeSend: function () {
                console.log("carregando posts...")
            },
            success: function (resposta) {
                console.log(resposta)
            },
            error: function (erro) { // if error occured
                console.log("Ocorreu um erro")
            },
        })

    }

    listarPostsAjax()

    // Ação do botão da categoria


    /*****************************
     * Detalhes do posts
     ****************************/
    var detalhesPostsAjax = function () {

    }

    /*****************************
     * Curtir e descurtir post
     ****************************/
    var curtirPostToggleAjax = function () {

    }

})