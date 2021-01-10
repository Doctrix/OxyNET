<!DOCTYPE HTML>
<html lang="fr" class="h-100">
<head>
    <meta charset="utf-8" />
    <meta name="publisher" content="OxyNET">
    <meta name="keywords" lang="fr" content="oxy,oxygames">
    <meta name="reply-to" content="contact@mifaconcept.fr">
    <meta name="category" content="internet">
    <meta name="robots" content="index, follow">
    <meta name="distribution" content="global">
    <meta name="Description" content="Serveur OxyGameS">
    <meta name="revisit-after" content="3 day">
    <meta name="author" lang="fr" content="DOCtriX">
    <meta name="copyright" content="oxygames">
    <meta name="generator" content="Microsoft Visual Studio, Visual Studio Code">
    <meta name="abstract" content="Ce site présente les nouveautées developper par OGS">
    <meta name="identifier-url" content="https://serveur.oxygames.fr/">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="icon" href="<?= '/inc/img/ico/favicon.ico' ?>">
    <link rel="stylesheet" type="text/css" href="/inc/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/inc/css/styles.css">
    <link rel="stylesheet" type="text/css" href="/inc/css/zoombox.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <title>
    <?= isset($titre_navBar) ? e($titre_navBar) : 'Tous les articles'; ?>
    </title>
</head>
<body class="d-flex flex-column">
<aside>   
    <div class="vertical-nav bg-dark" id="sidebar" role="group" aria-label="Button admin">     
        <ul class="nav flex-column bg-white mb-0">
        <a href="<?= BASE_URL ?>" class="nav-link text-light font-italic bg-dark">HOME</a>
        <?= nav_menu_admin('nav-link text-dark font-italic bg-light'); ?>
        </ul>   
    </div>
</aside>

<article class="bg-dark page-content" id="content" >         
<header class="t" style="text-align:right">
<button id="sidebarCollapse" type="button"class="btn btn-dark bg-dark rounded-pill shadow-sm px-5 mb-3">
    <small class="text-uppercase font-weight-bold">|||</small></button>

<h1 class="py-5 text-center">
        <?= isset($titre_header) ? e($titre_header): 'Oxy';
    ?></h1>
</header>
    <section class="container mt-4 py-2">
    <?= $content ?>
    </section>

    <footer class="card-body mt-5">
        <p>Page générée en <?= round(1000 * (microtime(true) - DEBUG_TIME)) ?>ms</p>
    </footer>

</article>

    <?php require(INC . 'js' . DS . 'scripts.php'); ?> 
    </body>
</html>
