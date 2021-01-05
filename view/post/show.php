<?php

use App\Server\ConfigDB;
use App\Table\{ArticleTable,CategorieTable};

$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = ConfigDB::getDatabase();
$article = (new ArticleTable($pdo))->find($id);
(new CategorieTable($pdo))->hydrateArticles([$article]);

if($article->obtenirSlug() !== $slug){
    $url = $router->url('article', ['slug' => $article->obtenirSlug(), 'id' => $id]);
    http_response_code(301);
    header('Location: ' . $url);
}

$titre_header = "{$article->obtenirTitre()}";
$titre_navBar = 'Article';
?>
<h1><b>Article : </b><?= e($article->obtenirTitre()) ?></h1>
<p class="text-muted"><?= $article->obtenirDateDeCreation()->format('d F Y') ?></p>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
            <b>
            <?php 
            foreach($article->obtenirCategories() as $k => $categorie):
                if ($k > 0):
                    echo ' - ';
                endif;
                $categorie_url = $router->url('categorie', ['id' => $categorie->obtenirID(), 'slug' => $categorie->obtenirSlug()]);
                ?><a href="<?= $categorie_url ?>"><?= e($categorie->obtenirNom()) ?></a>
            <?php endforeach ?>
            </b>
        </li>
    </ol>
</nav>
<p><?= $article->obtenirContenu() ?></p>
<a href="<?= e($article->obtenirLien()) ?>" class="btn btn-info" target="_blank">En savoir plus ...</a>
