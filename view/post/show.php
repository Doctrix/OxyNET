<?php

use Server\Connection;
use Table\{PostTable,CategoryTable};

$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = Connection::getPDO();
$post = (new PostTable($pdo))->find($id);
(new CategoryTable($pdo))->hydratePosts([$post]);

if($post->getSlug() !== $slug){
    $url = $router->url('post', ['slug' => $post->getSlug(), 'id' => $id]);
    http_response_code(301);
    header('Location: ' . $url);
}

$titre_header = "{$post->getTitle()}";
$titre_navBar = 'Article';
?>
<h1><b>Article : </b><?= e($post->getTitle()) ?></h1>
<p class="text-muted"><?= $post->getCreatedAt()->format('d F Y') ?></p>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
            <b>
            <?php 
            foreach($post->getCategories() as $k => $category):
                if ($k > 0):
                    echo ' - ';
                endif;
                $category_url = $router->url('category', ['id' => $category->getID(), 'slug' => $category->getSlug()]);
                ?><a href="<?= $category_url ?>"><?= e($category->getName()) ?></a>
            <?php endforeach ?>
            </b>
        </li>
    </ol>
</nav>
<p><?= $post->getContent() ?></p>
<p><a href="<?= e($post->getUrl()) ?>" class="btn btn-info" target="_blank">En savoir plus ...</a></p>
<?php if($_SESSION['auth']['admin']=true)
{echo  <<<HTML
<a href="{$router->url('admin_post_edit', ['id' => $post->getID()])}" class="btn btn-info" target="_blank">Modifier</a>
HTML;
}
?>
