<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800,800i&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <title>Energisa</title>
    <?php wp_head(); ?>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top " id="menu">
    <div class="bg-light menu-bg"></div>
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <div class="container">
        <a class="navbar-brand" href="#">
            <img class="brand-dark d-none" src="<?php bloginfo('template_url'); ?>/img/logo-dark.png" width="200" alt="">
            <img class="brand-light d-none" src="<?php bloginfo('template_url'); ?>/img/logo-light.png" width="200" alt="">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link py-4" href="#">Quem somos <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-4" href="#">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-4" href="#">Projetos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-4" href="#">Novidades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-4" href="#">Ideias</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <div class="collapse" id="collapseExample">
                    <!-- * input de pesquisa colapsado para pesquisa aleatória na pagina inteira -->
                    <input style="box-shadow: none;" class="form-control mr-sm-2 search-input" type="search" placeholder="Search" aria-label="Search">
                </div>
                <button style="box-shadow: none;" class="btn search-toggle my-2 my-sm-0" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <ion-icon class="ion-2x" name="search"></ion-icon>
                </button>
            </form>
        </div>
    </div>
</nav>