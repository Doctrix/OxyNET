<?php

use Controller\{ObjectHelper, Auth};
use Table\CategoryTable;
use App\HTML\Form;
use Validator\CategoryValidator;
use Model\Category;
use Server\Connection;

if(Auth::$session['auth']) {
    Auth::check();
    exit();
}

$errors = [];
$item = new Category();

if (!empty($_POST)) {
    $pdo = Connection::getPDO();
    $table = new CategoryTable($pdo);

    $v = new CategoryValidator($_POST, $table);
    ObjectHelper::hydrate($item, $_POST, ['name','slug']);
    if($v->validate()) {
        $table->Create([
            'name' => $item->getName(),
            'slug' => $item->getSlug()
        ],
        $item->getID());
        header('Location:' . $router->url('admin_category').'?create=1');
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
