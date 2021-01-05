<?php

use App\HTML\Form;
use App\{Auth, ObjectHelper};
use App\Validators\CategorieValidator;
use Table\CategorieTable;
use Server\ConfigDB;

if(Auth::$session['auth']) {
    Auth::Verifier();
    exit();
}

$pdo = ConfigDB::getDatabase();
$table = new CategorieTable($pdo);
$item = $table->find($params['id']);
$success = false;
$errors = [];
$fields = ['name', 'slug'];

if (!empty($_POST)) {
    $v = new CategorieValidator($_POST, $table, $item->obtenirID());
    ObjectHelper::hydrate($item, $_POST, $fields);
    if($v->validate()) {
        $table->MAJ([
            'name' => $item->getName(),
            'slug' => $item->obtenirSLug()
        ], 
        $item->obtenirID());
        $success = true;
    } else {
        $errors = $v->errors();
    }
}
$form = new Form($item, $errors);

$titre_header = 'Modifier la catégorie : '.e($item->getName());
$titre_navBar = "Modifier la catégorie n° {$params['id']}";
?>

<?php if ($success): ?>
    <div class="alert alert-success">
        La catégorie a bien été modifié
    </div>
<?php endif ?>

<?php if (isset($_GET['creer'])): ?>
    <div class="alert alert-success">
        La catégorie a bien été créé
    </div>
<?php endif ?>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        La catégorie n'a pas pu être modifié, merci de corriger vos erreurs
    </div>
<?php endif ?>

<?php require('_form.php') ?>