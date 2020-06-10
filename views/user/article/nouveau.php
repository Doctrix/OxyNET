<?php
use App\{Auth, ConnexionServeur,ObjectHelper};
use App\Table\ArticleTable;
use App\HTML\Form;
use App\Validators\ArticleValidator;
use App\Model\Article;

Auth::Verifier();

$titre_navBar = 'Créer un nouveau article';
$titre_header = 'Créer un article';

$errors = [];

$article = new Article();
$article->definirDateDeCreation(date('Y-m-d H:i:s'));

if (!empty($_POST)) {
    $pdo = ConnexionServeur::obtenirPDO();
    $articleTable = new ArticleTable($pdo);
    $v = new ArticleValidator($_POST,$articleTable,$article->obtenirID());
    ObjectHelper::hydrate($article, $_POST, ['titre','contenu','slug','date_de_creation','extrait','lien']);
    if($v->validate()) {
        $articleTable->Creer($article);
        header('Location:' . $router->url('admin_article', ['id' => $article->obtenirID()]).'?creer=1');
        exit();
    } else {
        $errors = $v->errors();
    }
}
$form = new Form($article, $errors);
?>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        L'article n'a pas pu être enregistré, merci de corriger vos erreurs
    </div>
<?php endif ?>

<?php require('_form.php') ?>