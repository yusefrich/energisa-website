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
            success: function (resposta) {
                $("#listNews").html(resposta)
            },
            error: function (erro) {
                console.log("Ocorreu um erro")
            },
        })
    }

    listarNovidadesAjax(page)

    $("body").on('click', '#btnLoadNews', function () {
        page = $(this).data("pagina");
        listarNovidadesAjax(page +1)
    })


})