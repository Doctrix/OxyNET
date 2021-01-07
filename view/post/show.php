<?php

use App\HTML\Form;
use Server\Connection;
use Table\{PostTable,CategoryTable};

$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = Connection::getPDO();
$post = (new PostTable($pdo))->find($id);
(new CategoryTable($pdo))->hydratePosts([$post]);

$titre_header = "{$post->getTitle()}";
$titre_navBar = 'Article';
$errors = [];

if($post->getSlug() !== $slug){
    $url = $router->url('post', ['slug' => $post->getSlug(), 'id' => $id]);
    http_response_code(301);
    header('Location: ' . $url);
}
?>
<header class="card-body card-title">
    <h1><b>Article : </b><?= e($post->getTitle()) ?></h1>
</header>

<section>
<p class="text-muted"><?= $post->getCreatedAt()->format('d F Y') ?></p>
<article>
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
<div class="card border-dark">
    <?= $post->getContent() ?>
<!-- Bouton -->
<p><a href="<?= e($post->getUrl()) ?>" class="btn btn-info" target="_blank">En savoir plus ...</a></p>
</div>
</article>
<?php if($_SESSION['auth']['admin']==true)
{echo  <<<HTML
<a href="{$router->url('admin_post_edit', ['id' => $post->getID()])}" class="btn btn-info" target="_blank">Modifier</a>
HTML;
}
?>
</section>
<br>
<footer>
<?php 
require_once(CONTROLLER . DS . 'Comments.php');
foreach($comments as $comment):
require_once('comment.php');
endforeach;
$form = new Form($post, $errors);
if (!empty($errors)):
?>
<div class="alert alert-danger">
    L'article n'a pas pu être enregistré, merci de corriger vos erreurs
</div>
<?php endif ?>
<br>
<?php require_once('_comment_form.php') ?>
