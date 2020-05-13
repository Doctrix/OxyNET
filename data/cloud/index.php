<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
          "http://www.w3.org/TR/html4/loose.dtd">
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="publisher" content="MIFACONCEPT">
    <meta name="keywords" lang="fr" content="mifa,mifaconcept,bbr,studio,mao,tuto,developpement,comment,rap,971,antillais,habituer,association,production,eux,contre,nous,tous,ensemble">
    <meta name="reply-to" content="contact@mifaconcept.fr">
    <meta name="category" content="internet">
    <meta name="robots" content="index, follow">
    <meta name="distribution" content="global">
    <meta name="Description" content="Le site de developpement de MifaConcept.fr tous les nouveaux contenues sont tester sur cette platforme.">
    <meta name="revisit-after" content="3 day">
    <meta name="author" lang="fr" content="Bertrand PRIVAT">
    <meta name="copyright" content="mifaconcept">
    <meta name="generator" content="Microsoft Visual Studio, AWD">
    <meta name="abstract" content="Ce site présente les nouveautées developper par mifa concept">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>CLOUD | MC DEV | MIFA Concept</title>

    <!-- add styles and scripts -->
    <link href="/css/styles.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/js/script.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
	<script src = "https://cdn.firebase.com/js/client/2.4.2/firebase.js"></script>
    <script type = "text/javascript" src = "index.js"></script>
</head>
<body>
    <h1>CLOUD - DISQUE DUR VIRTUEL</h1>

    <!-- L'en-tête -->

    <header>
        <h2><a href="//www.mifaconcept.fr/inscription/">Cliquez ICI pour créé un compte gratuitement</a></h2>
    </header>
	    
    <!-- Le menu -->
    
    <nav id="menu">        
        <div class="element_menu">
            <h3>Titre menu</h3>
            <ul>
                <li><a href="/">RETOUR A L'ACCUEIL</a></li>
                <li><a href="playlist/audio/">AUDIO</a></li>
                <li><a href="#">...</a></li>
            </ul>
        </div>    
    </nav>
	<!-- Le corps -->
	
	<div id="corps"><p> 
	<?php 
	$pseudo = anonyme;
	echo 'Bonjour <strong id="visit_name"> ' .$pseudo. ' </strong> !';
	?></p>
	<p>Aujourd'hui nous sommes <?php
	setlocale(LC_TIME, 'fr_FR.UTF8'); 
	echo strftime('<strong>%A %e %B %Y</strong>'); ?>, et il est <?php echo date('G:i:s'); ?>.</p>
	<button onclick = "googleSignin()">Google Signin</button>
	<button onclick = "googleSignout()">Google Signout</button>
    <br />
    <div id="wrapper">
        <div id="content">
            <ul class="social" id="css3">
                <li class="delicious">
                    <a href="http://www.delicious.com/"><strong>Delicious</strong></a>
                </li>
                <li class="digg">
                    <a href="http://digg.com/"><strong>Digg</strong></a>
                </li>
                <li class="facebook">
                    <a href="http://www.facebook.com/MIFAConcept/"><strong>Facebook</strong></a>
                </li>
                <li class="flickr">
                    <a href="http://www.flickr.com/"><strong>Flickr</strong></a>
                </li>
                <li class="linkedin">
                    <a href="http://www.linkedin.com/"><strong>LinkedIn</strong></a>
                </li>
                <li class="reddit">
                    <a href="http://www.reddit.com/"><strong>Reddit</strong></a>
                </li>
                <li class="rss">
                    <a href="//www.mifaconcept.fr/Sitemap.xml"><strong>RSS</strong></a>
                </li>
                <li class="twitter">
                    <a href="http://twitter.com/La_MIFA/"><strong>Twitter</strong></a>
                </li>
            </ul>
        </div>
    </div>
    <div style="clear: both"></div>
    <br />
    <p>Plus <a href="//www.mifaconcept.fr">d'informations</a> sur les Mise a jour du Reseau</p><br /></div>

	    <!-- Le pied de page -->

	<footer id="pied_de_page">
    <div id="Compteur_Visite"></div><br />
    <img src="http://www.mon-compteur.fr/html_c02genv2-65405-6" border="0" /> VUEs UNIQUEs<br />
	<br />
    Ceci est votre visite N&deg; <strong id="nb_visits">1</strong>.<br />
    <input type="button" value="Supprimer mes informations" onclick="scookie('visit_name','',-1);scookie('nb_visits','',-1);" /><br />
    M&ecirc;me si vous rafraichissez la page ou que vous fermer votre navigateur, le cookie restera enregistr&eacute;e jusqu'&agrave; ce que vous le supprimiez ou jusqu'&agrave; ce qu'il expire.
    <!-- scripts -->
    <script type="text/javascript" src="/js/compteurCloud.js"></script>
    <script type="text/javascript" src="/js/compteurAvecCookie.js"></script>

        <p>MifaConcept, tous droits réservés</p>
    </footer>
</body>
</html>