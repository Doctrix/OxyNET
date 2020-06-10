<?php
use App\Auth;

Auth::Verifier();
$titre_navBar = 'Mon tableau de bord';
/**
 * Posts
 */
?>
<th>
<button onclick="history.go(-1);" class="btn btn-secondary" >Retour</button>
<a href="<?= $router->url('admin_articles') ?>" class="btn btn-light">Tous les articles</a>
<a href="<?= $router->url('admin_article_nouveau') ?>" class="btn btn-primary">Ajouter un nouveau article</a>
</th>
<h2><ul>Informations utilisateur</ul></h2>
<?= getFlash() ?>
<hr/>
<h2><ul>Informations du site</ul></h2>
<strong>Pages publier :</strong><br>
<strong>Utilisateur inscrits :</strong><br>
<strong>Utilisateur connectés :</strong><br>
<strong>Totale de visite :</strong><br>
<hr/>
<h2><ul>Informations du serveur</ul></h2>
<strong>Adresse du serveur :</strong> <?= $_SERVER["HTTP_HOST"];?><br>
<strong>Nom du serveur :</strong> <?= $_SERVER["SERVER_NAME"];?><br>
<strong>Version Serveur :</strong> <?= $_SERVER["SERVER_SOFTWARE"];?><br>
<strong>OS du serveur :</strong> <?= get_defined_constants()["PHP_OS"];?><br>
<strong>Version PHP :</strong> <?= get_defined_constants()["PHP_VERSION"];?><br>
<strong>Protocol du serveur :</strong> <?= $_SERVER["SERVER_PROTOCOL"];?><br>
<strong>Encoding :</strong> <?= $_SERVER["HTTP_ACCEPT_ENCODING"];?><br>
<strong>Language :</strong> <?= $_SERVER["HTTP_ACCEPT_LANGUAGE"];?><br>
<strong>Requête HTTP :</strong> <?= $_SERVER["HTTP_ACCEPT"];?><br>
<div class="container" id="content">
    <h1>DEBUG</h1>
    <div class="formfull">
        <h2>SERVER</h2>
        <?php var_dump($_SERVER); ?>
    </div>
    <hr/> 
    <div class="formfull">    
        <h2>CONSTANTE</h2>
        <?php var_dump(get_defined_constants()); ?>
    </div>
    <hr/>
    <div class="formfull">    
        <h2>SESSION</h2>
        <?php /* var_dump($_SESSION); */ ?>
    </div>
    <br>
</div>