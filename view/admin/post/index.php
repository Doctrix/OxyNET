<?php

use App\Auth;
use Server\ConfigDB;
use Table\PostTable;

if(Auth::$session['auth']) {
    Auth::Verifier();
    exit(); 
}

$titre_header = "Tous les ARTICLES";
$title = "Tableau de bord : ARTICLES";

$pdo = ConfigDB::getDatabase();

$link = $router->url('admin_post');
[$posts, $pagination] = (new PostTable($pdo))->findPaginer();

if (isset($_GET['supprimer'])): ?>

<div class="alert alert-success">
    L'enregistrement à bien été supprimé
</div>
<?php endif ?>
<h2><?= $title ?></h2>
<br>
<p><button onclick="history.go(-1);" class="btn btn-secondary" >Retour</button>
<th><a href="<?= $router->url('admin_post_nouveau') ?>" class="btn btn-primary">Ajouter un article</a></th></p>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Titre</th>
            <th> </th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($posts as $post): ?>
    <tr>
        <td><?= $post->getID() ?></td>
        <td>
            <a href="<?= $router->url('admin_post',['id'=>$post->getID()]) ?>">
            <?= e($post->getPicture()) ?>
            </a>
        </td>
        <td>
            <a href="<?= $router->url('admin_post',['id'=>$post->getID()]) ?>">
            <?= e($post->getTitle()) ?>
            </a>
        </td>
        <td>
            <a href="<?= $router->url('admin_post_edit',['id'=>$post->getID()]) ?>" class="btn btn-primary">
            Modifier
            </a>
            <form action="<?= $router->url('admin_post_supprimer',['id'=>$post->getID()]) ?>"
            method="POST" onsubmit="return confirm('Voulez vous vraiment effectuer cette action ?')" style="display:inline">
            <button type="submit"  class="btn btn-danger">Supprimer</button>
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
