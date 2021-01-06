<?php

use Controller\Auth;
use Server\Connection;
use Table\PostTable;

$title = "Admin : ARTICLES";
$titre_header = "Tous les ARTICLES";

if(Auth::$session['auth']) {
    Auth::check();
    exit(); 
}

$pdo = Connection::getPDO();
$link = $router->url('admin_post');
[$posts, $pagination] = (new PostTable($pdo))->findPaginated();

if (isset($_GET['delete'])): ?>

<div class="alert alert-success">
    L'enregistrement à bien été supprimé
</div>
<?php endif ?>
<button onclick="history.go(-1);" class="btn btn-secondary" >Retour</button>
<th>
    <a href="<?= $router->url('admin_post_new') ?>" class="btn btn-primary">Ajouter un article</a>
</th>
<br clear="all">
<br clear="all">
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Miniature</th>
            <th>Titre</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($posts as $post): ?>
    <tr>
        <td>
            #<?= e($post->getID()) ?>
        </td>
        <td>
        <a href="<?= $router->url('admin_post_edit',['id'=>$post->getID()]) ?>">
            <img src="<?= $post->getPictureID() ?>" height="100px" width="100px" /></a>
        </td>
        <td>
            <a href="<?= $router->url('admin_post_edit',['id'=>$post->getID()]) ?>">
            <?= e($post->getTitle()) ?>
            </a>
        </td>
        <td>
            <a href="<?= $router->url('admin_post_edit',['id'=>$post->getID()]) ?>" class="btn btn-primary">
            Modifier
            </a>
            <form action="<?= $router->url('admin_post_delete',['id' => $post->getID()]) ?>"
            method="post" onsubmit="return confirm('Voulez vous vraiment effectuer cette action ?')" style="display:inline">
            <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </td>
    </tr>
    <?php endforeach ?>
    </tbody>
</table>

<div class="d-flex justify-content-between my-4">
    <?= $pagination->previousLink($link); ?>
    <?= $pagination->nextLink($link); ?>
</div>
