<form action="" id="form-comment" method="post">
    <h4>Poster un commentaire</h4>
    <?= $form->textarea('content','Votre commentaire'); ?>
    <button class="btn btn-primary">
        Commenter
    </button>
</form>