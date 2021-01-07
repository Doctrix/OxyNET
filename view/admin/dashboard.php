<?php

use Controller\Auth;
use Server\Connection;

$titre_header = $titre_navBar = 'Tableau de bord';

if(Auth::$session['auth']) {
    Auth::check();
    exit();
}

require ELEM . DS . 'compteur.php';

$pdo = Connection::getPDO();
$user = $pdo->query("SELECT * FROM user");
$user = $user->fetch();

$annee = (int)date('Y');
$annee_selectionner = empty($_GET['annee']) ? null : (int)$_GET['annee'];
$mois_selectionner = empty($_GET['mois']) ? null : $_GET['mois'];
if ($annee_selectionner && $mois_selectionner) {
    $total = nbr_de_vues_par_mois($annee_selectionner, $mois_selectionner);
    $detail_visite = nbr_de_vues_detail_par_mois($annee_selectionner, $mois_selectionner);
} else {
    $total = nbr_de_vues();
}
$mois = [
    '01' => 'Janvier',
    '02' => 'Fevrier',
    '03' => 'Mars',
    '04' => 'Avril',
    '05' => 'Mai',
    '06' => 'Juin',
    '07' => 'Juillet',
    '08' => 'Aout',
    '09' => 'Septembre',
    '10' => 'Octobre',
    '11' => 'Novembre',
    '12' => 'Decembre'
];
?>
<h2><ul>Membres</ul></h2>
<strong>Inscris :</strong><br/>
<strong>Connectés :</strong><br/>  
<hr/>
<div class="row">
    <div class="col-md-4">
        <div class="list-group">
            <?php for ($i = 0; $i < 5; $i++): ?>
            <a class="list-group-item <?= $annee - $i === $annee_selectionner ? 'active' : ''; ?>" href="admin?annee=<?= $annee - $i ?>"><?= $annee - $i ?></a>
            <?php if ($annee - $i === $annee_selectionner): ?>   
            <div class="list-group">
                <?php foreach ($mois as $numero => $name): ?>
                <a class="list-group-item <?= $numero === $mois_selectionner ? 'active' : ''; ?>" href="admin?annee=<?= $annee_selectionner ?>&mois=<?= $numero ?>"><?= $name ?></a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <?php endfor ?>   
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
            <h2><ul>Statistiques</ul></h2>
                <strong style="font-size:3em;"><?= $total; ?></strong><br/>
                Visite<?= $total > 1 ? 's' : '' ?> total
            </div>
        </div>
        <?php if (isset($detail_visite)): ?>
            <h2>Détails des visites pour le mois</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Jour</th>
                        <th>Nombre de visite</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($detail_visite as $ligne): ?>
                    <tr>
                        <td><?= $ligne['jour']; ?></td>
                        <td><?= $ligne['visites']; ?> visite<?= $ligne['visites'] > 1 ? 's' : ''; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>
<br/>
<th>
<button onclick="history.go(-1);" class="btn btn-secondary">Retour</button>
<a href="<?= $router->url('admin_post') ?>" class="btn btn-info">Tous les articles</a>
<a href="<?= $router->url('admin_post_new') ?>" class="btn btn-primary">Ajouter un nouveau article</a>
<a href="<?= $router->url('editeur') ?>" class="btn btn-dark">Editeur</a>
</th>
<hr/>
<div class="container">
    <h2><ul>Informations du serveur</ul></h2>
    <strong>Adresse du serveur :</strong> <?= $_SERVER["HTTP_HOST"];?><br/>
    <strong>Nom du serveur :</strong> <?= $_SERVER["SERVER_NAME"];?><br/>
    <strong>Version Serveur :</strong> <?= $_SERVER["SERVER_SOFTWARE"];?><br/>
    <strong>OS du serveur :</strong> <?= get_defined_constants()["PHP_OS"];?><br/>
    <strong>Version PHP :</strong> <?= get_defined_constants()["PHP_VERSION"];?><br/>
    <strong>Protocol du serveur :</strong> <?= $_SERVER["SERVER_PROTOCOL"];?><br/>
    <strong>Encoding :</strong> <?= $_SERVER["HTTP_ACCEPT_ENCODING"];?><br/>
    <strong>Language :</strong> <?= $_SERVER["HTTP_ACCEPT_LANGUAGE"];?><br/>
    <strong>Requête HTTP :</strong> <?= $_SERVER["HTTP_ACCEPT"];?><br/>
    <hr/>
    <h2><ul>Informations utilisateur</ul></h2>
    
    <strong>Name :</strong> <?= $user->username ?><br/>
</div>
