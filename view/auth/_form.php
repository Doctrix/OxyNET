<?php if (isset($_GET['forbidden'])) : ?>
<div class="alert alert-danger">
    Vous ne pouvez pas accéder à cette page
</div>
<?php endif ?>
<form action="<?= $router->url('login') ?>" method="POST">
    <div class="form-group formfull" id="content">
        <?= $form->input('username','Nom d\'utilisateur');  ?>
        <?= $form->input('password','Mot de passe');  ?>
        <div class="text-center"><button class="btn btn-primary" type="submit">Se connecter</button></div>
    </div>
</form>
<div class="text-center">
<div id="fb-root"></div>
<?php require_once INC.DS.'js/facebookConnect.js'; ?>
<div class="fb-login-button" 
data-size="large" 
data-button-type="continue_with" 
data-layout="default" 
data-auto-logout-link="false" 
data-use-continue-as="false"
data-width="">
</div>
</div>