<?php

use App\{ObjectHelper, Auth};
use Table\{PostTable, CategorieTable};
use App\HTML\Form;
use Server\ConfigDB;
use App\Validators\PostValidator;

if(Auth::$session['auth']) {
    Auth::Verifier();
    exit();
}

$pdo = ConfigDB::getDatabase();
$postTable = new PostTable($pdo);
$categorieTable = new CategorieTable($pdo);
$categories = $categorieTable->list();
$post = $postTable->find($params['id']);
$categorieTable->hydratePosts([$post]);
$success = false;

$errors = [];

if (!empty($_POST)) {
    $v = new PostValidator($_POST, $postTable, $post->getID(), $categories);
    ObjectHelper::hydrate($post, $_POST, ['title','picture','content','slug','date_de_creation','extrait','url']);
    if($v->validate()) {
        $pdo->beginTransaction();
        $postTable->MajPost($post);
        $postTable->attachCategories($post->getID(), $_POST['categories_ids']);
        $pdo->commit();
        $categorieTable->hydratePosts([$post]);
        $success = true;
    } else {
        $errors = $v->errors();
    }
}
$form = new Form($post, $errors);

$titre_header = 'Modifier l\'article : '.e($post->getTitle());
$titre_navBar = "Modifier l'article n° {$params['id']}";
?>

<?php if ($success): ?>
    <div class="alert alert-success">
        L'article a bien été modifié
    </div>
<?php endif ?>

<?php if (isset($_GET['creer'])): ?>
    <div class="alert alert-success">
        L'article a bien été créé
    </div>
<?php endif ?>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        L'article n'a pas pu être modifié, merci de corriger vos erreurs
    </div>
<?php endif ?>

<?php require('_form.php') ?>
