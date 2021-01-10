<?php

use Controller\{ObjectHelper, Auth, Picture};
use Table\{PostTable, CategoryTable};
use App\HTML\Form;
use Validator\PostValidator;
use Model\Post;
use Server\Connection;

Auth::check();

$titre_header = 'Créer un article';
$titre_navBar = 'Créer un nouveau article';

$errors = [];
$post = new Post();
$picture = new Picture();
$post->setCreatedAt(date('Y-m-d H:i:s'));

$pdo = Connection::getPDO();
$postTable = new PostTable($pdo);
$categoryTable = new CategoryTable($pdo);
$categories = $categoryTable->list();

if (!empty($_POST)) {
    $v = new PostValidator($_POST, $postTable, $post->getID(), $categories, $picture);
    ObjectHelper::hydrate($post, $_POST, ['title', 'picture_id', 'content', 'slug', 'created_at', 'excerpt', 'url']);
    if ($v->validate()) {
        $pdo->beginTransaction();
        $postTable->createPost($post);
        $postTable->attachCategories($post->getID(), $_POST['categories_ids']);
        $pdo->commit();
        header('Location:' . $router->url('admin_post', ['id' => $post->getID()]).'?create=1');
        exit();
    } else {
        $errors = $v->errors();
    }
}

$form = new Form($post, $errors);
?>

<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger">
        L'article n'a pas pu être enregistré, merci de corriger vos erreurs
    </div>
<?php endif ?>

<?php require('_form.php') ?>
