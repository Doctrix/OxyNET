<th>
<button onclick="history.go(-1);" class="btn btn-secondary" >Retour</button>
<a href="<?= $router->url('admin_articles') ?>" class="btn btn-light">Tous les articles</a>
</th> 
<form action="#" Method="POST">
    <?= $form->input('titre','Titre'); ?>
    <?= $form->input('slug','Slug'); ?>
    <?= $form->textarea('contenu','Contenu'); ?>
    <?= $form->select('categories_ids','Categories',$categories); ?>
    <?= $form->input('extrait','Extrait'); ?>
    <?= $form->input('lien','Lien de l\'auteur'); ?>
    <?= $form->input('date_de_creation','Date'); ?>    
    <button class="btn btn-info">
        <?php if ($article->obtenirID() !== null): ?>
            Enregister
        <?php else: ?>
            Créer
        <?php endif ?>
    </button>
</form>
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