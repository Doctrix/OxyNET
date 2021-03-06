<?php

use Server\Connection;
use Table\PostTable;

$pdo = Connection::getPDO();
$table = new PostTable($pdo);
$link = $router->url('blog');
[$posts, $pagination] = $table->findPaginated();

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