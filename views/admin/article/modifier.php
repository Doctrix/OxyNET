<?php
use App\{ConnexionServeur,ObjectHelper,Auth};
use App\Table\{ArticleTable,CategorieTable};
use App\HTML\Form;
use App\Validators\ArticleValidator;

Auth::Verifier();

$pdo = ConnexionServeur::obtenirPDO();
$articleTable = new ArticleTable($pdo);
$categorieTable = new CategorieTable($pdo);
$categories = $categorieTable->list();
$article = $articleTable->trouver($params['id']);
$categorieTable->hydrateArticles([$article]);
$success = false;
$errors = [];

if (!empty($_POST)) {
    $v = new ArticleValidator($_POST,$articleTable,$article->obtenirID());
    ObjectHelper::hydrate($article, $_POST, ['titre','contenu','slug','date_de_creation','extrait','lien']);
    if($v->validate()) {
        $articleTable->MajArticle($article);
        $success = true;
    } else {
        $errors = $v->errors();
    }
}
$form = new Form($article, $errors);

$titre_header = 'Modifier l\'article : '.e($article->obtenirTitre());
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
           
<?php ob_start();?>
<script src="<?= SITE_URL.DS.'src'.DS.'inc'.DS.'js'.DS.'tinymce'.DS; ?>tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
tinyMCE.init({
        // General options
        mode : "textareas",
        plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
});
$(".selector").flatpickr(optional_config);
</script>
<?php $script = ob_get_clean(); ?>