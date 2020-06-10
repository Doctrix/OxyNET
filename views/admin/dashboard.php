<?php
use App\Auth;

Auth::Verifier();
$titre_header = $titre_navBar = 'Tableau de bord';
?>
<th>
<button onclick="history.go(-1);" class="btn btn-secondary" >Retour</button>
<a href="<?= $router->url('admin_articles') ?>" class="btn btn-light">Tous les articles</a>
<a href="<?= $router->url('admin_article_nouveau') ?>" class="btn btn-primary">Ajouter un nouveau article</a>
</th>
<div class="container">
    <br/>
    <h2><ul>Informations de l'utilisateur</ul></h2>
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
    <hr/>
    <?php if ($_SESSION['auth']['admin']):?>
    <h3><b>DEBUG::</b> SERVER | CONSTANTE | SESSION</h3>
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
        <?php var_dump($_SESSION);  ?>
    </div>
    <?php endif ?>
</div>
<br>