<?php

use App\HTML\Form;
use Controller\{Auth, ObjectHelper};
use Validator\CategoryValidator;
use Table\CategoryTable;
use Server\Connection;

if(Auth::$session['auth']) {
    Auth::check();
    exit();
}

$pdo = Connection::getPDO();
$table = new CategoryTable($pdo);
$item = $table->find($params['id']);
$success = false;
$errors = [];
$fields = ['name', 'slug'];

if (!empty($_POST)) {
    $v = new CategoryValidator($_POST, $table, $item->getID());
    ObjectHelper::hydrate($item, $_POST, $fields);
    if($v->validate()) {
        $table->update([
            'name' => $item->getName(),
            'slug' => $item->getSLug()
        ], 
        $item->getID());
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

<?php if (isset($_GET['create'])): ?>
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