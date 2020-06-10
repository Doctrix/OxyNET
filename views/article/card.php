<?php
$categories = array_map(function ($categorie) use ($router) {
    $url = $router->url('categorie', ['id' => $categorie->obtenirID(), 'slug' => $categorie->obtenirSlug()]);
    return <<<HTML
<b><a href="{$url}">{$categorie->obtenirNom()}</a></b>
HTML;
}, $article->obtenirCategories());
?>
<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title"><?= e($article->obtenirTitre()) ?></h5>
        <p class="text-muted">
            <?= $article->obtenirDateDeCreation()->format('d F Y') ?>
            <?php if (!empty($article->obtenirCategories())): ?>
            ::
            <?= implode(', ', $categories) ?>
            <?php endif ?>
        </p>
        <p>
            <?= $article->obtenirExcerpt() ?>
        </p>
        <p>
            <a href="<?= $router->url('article', ['id' => $article->obtenirID(), 'slug' => $article->obtenirSlug()]) ?>" class="btn btn-info">Voir plus</a>
        </p>
    </div>
</div> 