<th>
<button onclick="history.go(-1);" class="btn btn-secondary" >Retour</button>
<a href="<?= $router->url('admin_category') ?>" class="btn btn-light">Tous les categories</a>
</th> 
<form action="#" method="post">
    <?= $form->input('name','Nom'); ?>
    <?= $form->input('slug','Slug'); ?>
    <button class="btn btn-info">
        <?php if ($item->getID() !== null): ?>
            Enregister
        <?php else: ?>
            Créer
        <?php endif ?>
    </button>
</form>