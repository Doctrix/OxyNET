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

<body class="d-flex flex-column h-100">

<header class="header mt-auto py-3 bg-dark">
<h1 class="titre text-center"><b><?= isset($titre_header) ? e($titre_header): 'Oxy'; ?></b></h1>
<aside>
    <div class="mr-auto" style="text-align:right">
        <button id="sidebarCollapse" type="button" class="btn btn-dark bg-dark rounded-pill shadow-sm px-5 mb-3"><small class="text-uppercase font-weight-bold">...</small></button>
    </div>
</aside>
</header>

<aside>   
    <div class="vertical-nav bg-dark" id="sidebar" role="group" aria-label="Button admin">     
        <ul class="nav flex-column bg-white mb-0">
        <a href="<?= BASE_URL ?>" class="nav-link text-light font-italic bg-dark">HOME</a>
        <?= nav_menu_admin('nav-link text-dark font-italic bg-light'); ?>
        </ul>   
    </div>
</aside>

<section class="page-content h-100 btn-post" id="content" >
    <article class="container">
        <?= $content ?>
    </article>
</section>

<br clear="all">
<footer class="footer mt-auto bg-dark">
    <br clear="all">
    <div class="container">
        <strong class="">O</strong>xy<strong class="">G</strong>ène<strong class="">S</strong>tudio <a href="//oxygames.fr" target="_blank">[O.G.S]</a> en partenariat avec : <a href="//mifaconcept.fr" target="_blank">Mifa Concept</a>
        <p> Page générée en <?= round(1000 * (microtime(true) - DEBUG_TIME)) ?>ms</p> 
    </div>
</footer>

    <!-- script -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="/inc/js/script.js" type="text/javascript"></script>
    <script src="/inc/js/jquery.js" type="text/javascript"></script>
    <script src="/inc/js/bootstrap.js" type="text/javascript"></script>
    <script src="/inc/js/zoombox.js" type="text/javascript"></script>
    <script type="text/javascript"> 
    //<![CDATA[
        $(function(){
            $('a.zoombox').zoombox();
        });
    //]]>
    </script>
    </body>
</html>