<?php
use Server\Connection;
use Table\{PostTable, CategoryTable};

$titre_navBar = 'Catégorie';

$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = Connection::getPDO();
$category = (new CategoryTable($pdo))->find($id);

$titre_header = "{$category->getName()}";

if($category->getSlug() !== $slug){
    $url = $router->url('category', ['slug' => $category->getSlug(), 'id' => $id]);
    http_response_code(301);
    header('Location: ' . $url);
}
[$posts,$paginatedQuery] = (new PostTable($pdo))->findPaginatedForCategory($category->getID());
$link = $router->url('category', ['id' => $category->getID(), 'slug' => $category->getSlug()]);
?>

<h1><b>Catégorie : </b><?= e($category->getName()) ?></h1>
<div class="row">
    <?php foreach($posts as $post): ?>
    <div class="col-md-3">
        <?php require_once(POST . DS . 'card.php'); ?>
    </div>
    <?php endforeach ?>
</div>

<div class="d-flex justify-content-between my-4">
    <?= $paginatedQuery->previousLink($link) ?>
    <?= $paginatedQuery->nextLink($link) ?>
</div>
