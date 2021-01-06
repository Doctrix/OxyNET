<?php
use Widget\Social;
$widgets = new Social();
require_once ELEM . DS . 'compteur.php';
ajouter_une_vue();
$vues = nbr_de_vues();
require_once ELEM . DS . 'compteur_if.php';
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
    <link rel="icon" href="<?= '/inc/img/ico/favicon.ico' ?>">
    <link rel="stylesheet" type="text/css" href="<?= '/inc/css/bootstrap.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?= '/inc/css/styles.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?= '/inc/css/zoombox.css' ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <title>
        <?= isset($titre_navBar) ? e($titre_navBar) : 'OxyNET'; ?>
    </title> 
</head>
<header>
    <h1 class="titre text-center"><b><?= isset($titre_header) ? e($titre_header): 'Oxy'; ?></b></h1>           
</header>        
<body class="d-flex flex-column h-100">
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
    <div class="container mt-4">
        <?= $content ?>
    </div>
    <br clear="all">
<footer class="bg-dark py-4 footer mt-auto">
    <div class="container">   
    <strong style="color:yellow">O</strong>xy<strong style="color:yellow">G</strong>ène<strong style="color:yellow">S</strong>tudio <a href="//oxygames.fr" target="_blank" style="color:yellow">[O.G.S]</a> en partenariat avec : <a href="//mifaconcept.fr" target="_blank" style="color:green">Mifa Concept</a> | Crée avec <a href="https://github.com/Doctrix/OxyNET" target="_blank" style="color:yellow">OxyNET</a> v1.0
    <p style="color:white;">Il y a <strong style="color:green"><?= $vues ?></strong> visite<?php if ($vues > 1):?>s<?php endif; ?> sur le site</p>
    </div>
</footer>
<!-- script -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v7.0" nonce="syZaIx9B"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script data-ad-client="ca-pub-2314966356420014" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script src="/inc/js/script.js" type="text/javascript"></script>
<script src="/inc/js/jquery.js" type="text/javascript"></script>
<script src="/inc/js/bootstrap.js" type="text/javascript"></script>
<?php if(isset($script)): ?><?= $script; ?><?php endif ?>
</body>
</html>