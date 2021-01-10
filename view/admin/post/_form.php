<button onclick="history.go(-1);" class="btn btn-secondary" >Retour</button><a href="<?= $router->url('admin_post') ?>" class="btn btn-light">Tous les articles</a>
<div class="py-4">
    <form action="" method="POST">
        <?= $form->picture('picture_id', 'Image a la une'); ?>
        <?= $form->input('title', 'Titre*'); ?>
        <?= $form->input('slug', 'Url*'); ?>
        <?= $form->textarea('content', 'Contenu*'); ?>
        <?= $form->select('categories_ids', 'Categories*', $categories); ?>
        <?= $form->input('excerpt', 'Extrait*'); ?>
        <?= $form->input('url', 'Liens'); ?>
        <?= $form->input('created_at', 'Date*'); ?>    
        <button class="btn btn-info">
            <?php if ($post->getID() !== null) : ?>
                Enregister
            <?php else : ?>
                Créer
            <?php endif ?>
        </button>
    </form>
 </div>   
<?php ob_start()?>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
tinyMCE.init({
// General options 
mode : "textarea",
plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",});
$(".selector").flatpickr(optional_config);
</script>
<script src="/inc/js/script.js" type="text/javascript"></script>
<script src="/inc/js/jquery.js" type="text/javascript"></script>
<script src="/inc/js/bootstrap.js" type="text/javascript"></script>
<script src="/inc/js/tinymce/tinymce.min.js" type="text/javascript" referrerpolicy="origin"></script>
<?php $script = ob_get_clean() ?>
