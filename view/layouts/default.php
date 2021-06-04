<?php
use Widget\Social;
$widgets = new Social();
require_once ELEM . 'compteur.php';
ajouter_une_vue();
$vues = nbr_de_vues();
require_once ELEM . 'compteur_if.php';

?>

<!DOCTYPE HTML>
<html lang="fr" class="h-100">
<head>
    <meta charset="utf-8" />
    <meta name="publisher" content="OxyNET">
    <meta name="keywords" lang="fr" content="oxy,oxygames">
    <meta name="reply-to" content="contact@oxygames.fr">
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
    <link href="<?= '/inc/img/ico/favicon.ico' ?>" rel="icon">
    <link href="/inc/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/inc/css/zoombox.css" rel="stylesheet" type="text/css" media="screen">
    <link href="/inc/css/styles.css" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <title>
        <?= isset($titre_navBar) ? e($titre_navBar) : 'OxyNET'; ?>
    </title> 
</head>
<body class="d-flex flex-column">
<article class="<?= $background ?>">   
<header class="header mt-auto py-3">
    <h1 class="titre text-center"><b><?= isset($titre_header) ? e($titre_header): 'Oxy'; ?></b></h1>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= BASE_URL ?>"><?= isset($titre_navBar) ? e($titre_navBar) : 'Accueil'; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerPrincipal" aria-controls="navbarTogglerPrincipal" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerPrincipal">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <?= nav_menu('nav-link'); ?>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Rechercher">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
            </form>
        </div>
    </nav>
</header>
<?= getFlash() ?>

<section>
    <div class="container h-100">
        <?= $content ?>
    </div>    
</section>

<br clear="all">

<footer class="bg-dark card-body">
    <div class="container h-100 mt-5 py-5">
        <strong style="color:yellow">O</strong>xy<strong style="color:yellow">G</strong>ène<strong style="color:yellow">S</strong>tudio <a href="//oxygames.fr" target="_blank" style="color:yellow">[O.G.S]</a>
         en partenariat avec : <a href="//mifaconcept.fr" target="_blank" style="color:green">Mifa Concept</a> | Crée avec <a href="https://github.com/Doctrix/OxyNET" target="_blank" style="color:yellow">OxyNET</a> v1.0
            <p style="color:white;">Il y a <strong style="color:green"><?= $vues ?></strong>
             visite<?php if ($vues > 1) : ?>s<?php endif; ?> sur le site</p>
    </div>
</footer>

</article>
<!-- script -->
<?php require(INC . 'js' . DS .  'scripts.php'); ?> 
    </body>
</html>