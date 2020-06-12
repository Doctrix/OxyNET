<?php
use App\Table\ArticleTable;
use App\ConnexionServeur;


$pdo = ConnexionServeur::obtenirPDO();
$table = new ArticleTable($pdo);
$link = $router->url('home');
[$articles, $pagination] = $table->trouverPaginer();

$titre_header = 'O.G.S';
$titre_navBar = 'Accueil';
?>
<h1><?= e($titre_header); ?></h1>
<div class="row">
    <?php foreach($articles as $article): ?>
    <div class="col-md-3">
        <?php require 'card.php' ?>
    </div>
    <?php endforeach ?>
</div>
<div class="d-flex justify-content-between my-4">
    <?= $pagination->previousLink($link); ?>
    <?= $pagination->nextLink($link); ?>
</div>