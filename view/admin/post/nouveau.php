<?php

use App\{ObjectHelper, Auth, Picture};
use Table\{PostTable, CategorieTable};
use App\HTML\Form;
use App\Validators\PostValidator;
use Model\Post;
use Server\ConfigDB;

if(Auth::$session['auth']) {
    Auth::Verifier();
    exit();
}

$errors = [];
$post = new Post();
$picture = new Picture();
$post->setDateDeCreation(date('Y-m-d H:i:s'));

$pdo = ConfigDB::getDatabase();
$postTable = new PostTable($pdo);
$categorieTable = new CategorieTable($pdo);

$categories = $categorieTable->list();   

if (!empty($_POST)) {
    $v = new PostValidator($_POST, $postTable, $post->getID(), $categories, $picture);
    ObjectHelper::hydrate($post, $_POST, ['title','picture','content','slug','date_de_creation','extrait','url']);
    if($v->validate()) {
        $pdo->beginTransaction();
        $postTable->CreerPost($post);
        $postTable->attachCategories($post->getID(), $_POST['categories_ids']);
        $pdo->commit();
        header('Location:' . $router->url('admin_post', ['id' => $post->getID()]).'?creer=1');
        exit();
    } else {
        $errors = $v->errors();
    }
}
$form = new Form($post, $errors);

$titre_header = 'Créer un article';
$titre_navBar = 'Créer un nouveau article';
?>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        L'article n'a pas pu être enregistré, merci de corriger vos erreurs
    </div>
<?php endif ?>

<?php require('_form.php') ?>
