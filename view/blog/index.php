<?php

use Server\ConfigDB;
use Table\PostTable;

$pdo = ConfigDB::getDatabase();
$table = new PostTable($pdo);
$link = $router->url('blog');
[$articles, $pagination] = $table->findPaginer();

$titre_header = 'OxyNET';
$titre_navBar = 'Accueil';
?>
<h1><?= e($titre_header); ?></h1>
<div class="row">
    <?php foreach($posts as $post): ?>
    <div class="col-md-3">
        <?php require 'card.php' ?>
    </div>
    <?php endforeach ?>
</div>
<div class="d-flex justify-content-between my-4">
    <?= $pagination->previousLink($link); ?>
    <?= $pagination->nextLink($link); ?>
</div>