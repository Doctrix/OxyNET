<?php

use Server\ConfigDB;
use Table\{PostTable,CategorieTable};

$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = ConfigDB::getDatabase();
$post = (new PostTable($pdo))->find($id);
(new CategorieTable($pdo))->hydratePosts([$post]);

if($post->getSlug() !== $slug){
    $url = $router->url('post', ['slug' => $post->getSlug(), 'id' => $id]);
    http_response_code(301);
    header('Location: ' . $url);
}

$titre_header = "{$post->getTitre()}";
$titre_navBar = 'Article';
?>
<h1><b>Article : </b><?= e($post->getTitre()) ?></h1>
<p class="text-muted"><?= $post->getDateDeCreation()->format('d F Y') ?></p>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
            <b>
            <?php 
            foreach($post->getCategories() as $k => $categorie):
                if ($k > 0):
                    echo ' - ';
                endif;
                $categorie_url = $router->url('categorie', ['id' => $categorie->getID(), 'slug' => $categorie->getSlug()]);
                ?><a href="<?= $categorie_url ?>"><?= e($categorie->getName()) ?></a>
            <?php endforeach ?>
            </b>
        </li>
    </ol>
</nav>
<p><?= $post->getContent() ?></p>
<a href="<?= e($post->getUrl()) ?>" class="btn btn-info" target="_blank">En savoir plus ...</a>
