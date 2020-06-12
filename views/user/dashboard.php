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
