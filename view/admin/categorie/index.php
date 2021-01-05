<?php

use App\Auth;
use Server\ConfigDB;
use Table\CategorieTable;


if(Auth::$session['auth']) {
    Auth::Verifier();
    exit(); 
}
$pdo = ConfigDB::getDatabase();
$link = $router->url('admin_categorie');
$items = (new CategorieTable($pdo))->all();

$titre_header = "Gestion des catégories";
$titre_navBar = "CATEGORIES";
?>

<?php if (isset($_GET['supprimer'])): ?>
<div class="alert alert-success">
    L'enregistrement à bien été supprimé
</div>
<?php endif ?>
<p><button onclick="history.go(-1);" class="btn btn-secondary" >Retour</button></p>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Titre</th>
            <th>Slug</th>
            <th>
            <a href="<?= $router->url('admin_categorie_nouveau') ?>" class="btn btn-primary">Ajouter une catégorie</a>
            </th>  
        </tr>
    </thead>
    <tbody>
    <?php foreach($items as $item): ?>
    <tr>
        <td>#<?= $item->getID() ?></td>
        <td>
            <a href="<?= $router->url('admin_categorie',['id'=>$item->getID()]) ?>">
            <?= e($item->getName()) ?>
            </a>
        </td>
        <td><?= $item->getSlug() ?></td>
        <td>
            <a href="<?= $router->url('admin_categorie_edit',['id'=>$item->getID()]) ?>" class="btn btn-primary">
            Modifier
            </a>
            <form action="<?= $router->url('admin_categorie_supprimer',['id'=>$item->getID()]) ?>"
            method="POST" onsubmit="return confirm('Voulez vous vraiment effectuer cette action ?')" style="display:inline">
            <button type="submit"  class="btn btn-danger">Supprimer</button>
            </form>
        </td>
    </tr>
    <?php endforeach ?>
    </tbody>
</table>