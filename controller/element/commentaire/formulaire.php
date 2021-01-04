<br>
<div class="formfull">
    <div id="conteneur">
    <h2>Les commentaires</h2>
        <?php foreach($comm as $k => $com): ?>
        <div class="formfull">
            <p><a href="<?= $com['lien']; ?>"><?= $com['username']; ?></a></p>
            <p class="card bg-dark txt"><?= $com['commentaire']; ?></p>
        </div>        
        <?php endforeach ?>
        <br>
        
        <h2>Ecrire un commentaire</h2>
        <!-- formulaire mailto -->
        <form class="formfull" action="#" method="post">
            <table cellspacing="1" summary="">
                *Nom : <?= input_req('username'); ?>
                *Mail : <?= input_req('email'); ?>
                URL de votre site/blog : <?= input('lien'); ?>
                *Votre commentaire : <?= textarea('commentaire'); ?>
                <input class="btn btn-dark" type="submit" value="Envoyer"/>
                <input type="hidden" name="post_id" value="<?= $_POST['id']; ?>">
            </table>
        </form>
    </div>
</div>
</div>