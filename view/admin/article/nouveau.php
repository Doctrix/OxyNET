<?php

use Model\{ObjectHelper, Auth, Images};
use Model\Table\{ArticleTable, CategorieTable};
use Model\HTML\Form;
use Model\Validators\ArticleValidator;
use Model\Classes\Article;
use Model\Server\ConfigDB;

if(Auth::$session['auth']) {
    Auth::Verifier();
    exit();
}

$errors = [];
$article = new Article();
$images = new Images();
$article->definirDateDeCreation(date('Y-m-d H:i:s'));

$pdo = ConfigDB::getDatabase();
$articleTable = new ArticleTable($pdo);
$categorieTable = new CategorieTable($pdo);

$categories = $categorieTable->list();   

if (!empty($_POST)) {
    $v = new ArticleValidator($_POST,$articleTable,$article->obtenirID(),$categories,$images);
    ObjectHelper::hydrate($article, $_POST, ['titre','image','contenu','slug','date_de_creation','extrait','lien']);
    if($v->validate()) {
        $pdo->beginTransaction();
        $articleTable->CreerArticle($article);
        $articleTable->attachCategories($article->obtenirID(), $_POST['categories_ids']);
        $pdo->commit();
        header('Location:' . $router->url('admin_article', ['id' => $article->obtenirID()]).'?creer=1');
        exit();
    } else {
        $errors = $v->errors();
    }
}
$form = new Form($article, $errors);

$titre_header = 'Créer un article';
$titre_navBar = 'Créer un nouveau article';
?>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        L'article n'a pas pu être enregistré, merci de corriger vos erreurs
    </div>
<?php endif ?>

<?php require('_form.php') ?>
