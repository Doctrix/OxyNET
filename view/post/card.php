<?php
$categories = array_map(function ($category) use ($router) {
    $url = $router->url('category', ['id' => $category->getID(), 'slug' => $category->getSlug()]);
    return <<<HTML
<b><a href="{$url}">{$category->getName()}</a></b>
HTML;
}, $post->getCategories());
?>
<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title"><?= e($post->getTitle()) ?></h5>
        <p class="text-muted">
            <?= $post->getCreatedAt()->format('d F Y') ?>
            <?php if (!empty($post->getCategories())): ?>
            ::
            <?= implode(', ', $categories) ?>
            <?php endif ?>
        </p>
        <p>
            <?= $post->getExcerpt() ?>
        </p>
        <p>
            <a href="<?= $router->url('post', ['id' => $post->getID(), 'slug' => $post->getSlug()]) ?>" class="btn btn-info">Voir plus</a>
        </p>
    </div>
</div> 