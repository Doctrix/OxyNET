<?php

use App\Auth;
use Server\Connection;
use Table\CategoryTable;


if(Auth::$session['auth']) {
    Auth::check();
    exit(); 
}

$pdo = Connection::getPDO();
$link = $router->url('admin_category');
$items = (new CategoryTable($pdo))->all();

$titre_header = "Gestion des catégories";
$titre_navBar = "CATEGORIES";
?>

<?php if (isset($_GET['delete'])): ?>
<div class="alert alert-success">
    L'enregistrement à bien été supprimé
</div>
<?php endif ?>
<p><button onclick="history.go(-1);" class="btn btn-secondary" >Retour</button></p>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Titre</th>
            <th>Slug</th>
            <th>
            <a href="<?= $router->url('admin_category_new') ?>" class="btn btn-primary">Ajouter une catégorie</a>
            </th>  
        </tr>
    </thead>
    <tbody>
    <?php foreach($items as $item): ?>
    <tr>
        <td>#<?= $item->getID() ?></td>
        <td>
            <a href="<?= $router->url('admin_category_edit',['id'=>$item->getID()]) ?>">
            <?= e($item->getName()) ?>
            </a>
        </td>
        <td><?= $item->getSlug() ?></td>
        <td>
            <a href="<?= $router->url('admin_category_edit',['id'=>$item->getID()]) ?>" class="btn btn-primary">
            Modifier
            </a>
            <form action="<?= $router->url('admin_category_delete',['id'=>$item->getID()]) ?>"
            method="POST" onsubmit="return confirm('Voulez vous vraiment effectuer cette action ?')" style="display:inline">
            <button type="submit"  class="btn btn-danger">Supprimer</button>
            </form>
        </td>
    </tr>
    <?php endforeach ?>
    </tbody>
</table>