<?php
use App\Auth;
use App\Server\ConfigDB;
use App\Table\CategorieTable;

Auth::Verifier();

$pdo = ConfigDB::getDatabase();
$link = $router->url('admin_categories');
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
        <td>#<?= $item->obtenirID() ?></td>
        <td>
            <a href="<?= $router->url('admin_categorie',['id'=>$item->obtenirID()]) ?>">
            <?= e($item->obtenirNom()) ?>
            </a>
        </td>
        <td><?= $item->obtenirSlug() ?></td>
        <td>
            <a href="<?= $router->url('admin_categorie',['id'=>$item->obtenirID()]) ?>" class="btn btn-primary">
            Modifier
            </a>
            <form action="<?= $router->url('admin_categorie_supprimer',['id'=>$item->obtenirID()]) ?>"
            method="POST" onsubmit="return confirm('Voulez vous vraiment effectuer cette action ?')" style="display:inline">
            <button type="submit"  class="btn btn-danger">Supprimer</button>
            </form>
        </td>
    </tr>
    <?php endforeach ?>
    </tbody>
</table>