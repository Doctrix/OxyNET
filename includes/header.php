<?php
require_once 'fonctions.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
          "http://www.w3.org/TR/html4/loose.dtd">
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="publisher" content="OxyServer">
    <meta name="keywords" lang="fr" content="mifa,mifaconcept,oxy,oxygames">
    <meta name="reply-to" content="contact@mifaconcept.fr">
    <meta name="category" content="internet">
    <meta name="robots" content="index, follow">
    <meta name="distribution" content="global">
    <meta name="Description" content="Serveur OxyGameS">
    <meta name="revisit-after" content="3 day">
    <meta name="author" lang="fr" content="Bertrand PRIVAT">
    <meta name="copyright" content="oxygames">
    <meta name="generator" content="Microsoft Visual Studio, Visual Studio Code">
    <meta name="abstract" content="Ce site présente les nouveautées developper par Oxy">
    <meta name="identifier-url" content="https://server.oxygames.fr/">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="icon" href="data/images/ico/favicon.ico">   
    <title>
        <?php if (isset($title)): ?>
            <?= $title ?>
        <?php else: ?>
            Oxy
        <?php endif ?>
    </title>
    <link type="text/css" href="/data/css/styles.css" rel="stylesheet"/>
    <link type="text/css" href="/data/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- script -->
    <script type="text/javascript" src="/data/js/script.js"></script>
    <script type="text/javascript" src="/data/js/jquery.js"></script>
    <script type="text/javascript" src="/data/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/data/js/compteur.js"></script>
    <script type="text/javascript" src="/data/js/animChargement.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>
<body>
<header><h1 class="titre"><?= $title ?></h1></header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><?= $title ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <?= nav_menu('nav-link') ?>
      </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<main role="main" class="container">