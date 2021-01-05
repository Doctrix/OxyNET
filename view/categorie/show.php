<?php

use Server\ConfigDB;
use Table\{PostTable, CategorieTable};

$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = ConfigDB::getDatabase();
$categorie = (new CategorieTable($pdo))->find($id);

if($categorie->getSlug() !== $slug){
    $url = $router->url('categorie', ['slug' => $categorie->getSlug(), 'id' => $id]);
    http_response_code(301);
    header('Location: ' . $url);
}
[$posts,$paginatedQuery] = (new PostTable($pdo))->findPaginerPourLaCategorie($categorie->getID());
$link = $router->url('categorie', ['id' => $categorie->getID(), 'slug' => $categorie->getSlug()]);

$titre_header = "{$categorie->getName()}";
$titre_navBar = 'Catégorie';
?>

<h1><b>Catégorie : </b><?= e($categorie->getName()) ?></h1>
<div class="row">
    <?php foreach($posts as $post): ?>
    <div class="col-md-3">
        <?php require_once POST . DS . 'card.php' ?>
    </div>
    <?php endforeach ?>
</div>
<div class="d-flex justify-content-between my-4">
    <?= $paginatedQuery->previousLink($link) ?>
    <?= $paginatedQuery->nextLink($link) ?>
</div>
