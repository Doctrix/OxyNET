<th>
<button onclick="history.go(-1);" class="btn btn-secondary" >Retour</button>
<a href="<?= $router->url('admin_categories') ?>" class="btn btn-light">Tous les categories</a>
</th> 
<form action="#" Method="POST">
    <?= $form->input('nom','Titre'); ?>
    <?= $form->input('slug','Slug'); ?>
    <button class="btn btn-info">
        <?php if ($item->obtenirID() !== null): ?>
            Enregister
        <?php else: ?>
            Créer
        <?php endif ?>
    </button>
</form>