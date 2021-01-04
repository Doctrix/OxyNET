<?php

use Model\Server\ConfigDB;
use Model\Table\{ArticleTable,CategorieTable};

$id = (int)$params['id'];
$slug = $params['slug'];
$pdo = ConfigDB::getDatabase();
$categorie = (new CategorieTable($pdo))->trouver($id);

if($categorie->obtenirSlug() !== $slug){
    $url = $router->url('categorie', ['slug' => $categorie->obtenirSlug(), 'id' => $id]);
    http_response_code(301);
    header('Location: ' . $url);
}
[$articles,$paginatedQuery] = (new ArticleTable($pdo))->trouverPaginerPourLaCategorie($categorie->obtenirID());
$link = $router->url('categorie', ['id' => $categorie->obtenirID(), 'slug' => $categorie->obtenirSlug()]);

$titre_header = "{$categorie->obtenirNom()}";
$titre_navBar = 'Catégorie';
?>
<h1><b>Catégorie : </b><?= e($categorie->obtenirNom()) ?></h1>
<div class="row">
    <?php foreach($articles as $article): ?>
    <div class="col-md-3">
        <?php require VIEWS.DS.'article'.DS.'card.php' ?>
    </div>
    <?php endforeach ?>
</div>
<div class="d-flex justify-content-between my-4">
    <?= $paginatedQuery->previousLink($link) ?>
    <?= $paginatedQuery->nextLink($link) ?>
</div>
