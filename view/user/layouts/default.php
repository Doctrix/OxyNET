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
    <title><?= isset($titre_navBar) ? e($titre_navBar) : 'PROFIL'; ?></title> 
</head>
<header>
    <h1 class="titre text-center"><b><?= isset($titre_header) ? e($titre_header): 'Espace utilisateur'; ?></b></h1>           
</header>        
<body class="d-flex flex-column h-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= BASE_URL ?>"><?= isset($titre_navBar) ? e($titre_navBar) : 'Accueil'; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerPrincipal" aria-controls="navbarTogglerPrincipal" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerPrincipal">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <?= nav_menu_user('nav-link'); ?>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Rechercher">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
            </form>
        </div>
    </nav>             
    <div class="container mt-4">
        <?= $content ?>
    </div> 
<footer class="bg-dark py-4 footer mt-auto">
    <div class="container">
        <strong class="">O</strong>xy<strong class="">G</strong>ène<strong class="">S</strong>tudio <a href="//oxygames.fr" target="_blank">[O.G.S]</a> en partenariat avec : <a href="//mifaconcept.fr" target="_blank">Mifa Concept</a>    
    </div>
</footer>
<!-- script -->
<?php require_once(INC . 'js' . DS .  'scripts.php'); ?> 
</body>
</html>