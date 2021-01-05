<?php

use App\{ObjectHelper, Auth};
use Table\CategorieTable;
use App\HTML\Form;
use App\Validators\CategorieValidator;
use Model\Categorie;
use Server\ConfigDB;

if(Auth::$session['auth']) {
    Auth::Verifier();
    exit();
}

$errors = [];
$item = new Categorie();

if (!empty($_POST)) {
    $pdo = ConfigDB::getDatabase();
    $table = new CategorieTable($pdo);

    $v = new CategorieValidator($_POST,$table);
    ObjectHelper::hydrate($item, $_POST, ['name','slug']);
    if($v->validate()) {
        $table->Creer([
            'name' => $item->getName(),
            'slug' => $item->getSlug()
        ],
        $item->getID());
        header('Location:' . $router->url('admin_categorie').'?creer=1');
        exit();
    } else {
        $errors = $v->errors();
    }
}
$form = new Form($item, $errors);

$titre_header = 'Créer une catégorie';
$titre_navBar = 'Créer une nouvelle catégorie';
?>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        La catégorie n'a pas pu être enregistré, merci de corriger vos erreurs
    </div>
<?php endif ?>

<?php require('_form.php') ?>
