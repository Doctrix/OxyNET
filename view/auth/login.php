<?php

use App\Auth;
use App\HTML\Form;
use Model\User;
use Server\ConfigDB;
use Table\Exception\NotFoundException;
use Table\UserTable;

$titre_header = "Se connecter";
$titre_navBar = "Connexion";

if(Auth::$session['auth']) {
    header('Location: ' . $router->url('admin'));
    exit(); 
} 

$user = new User();
$errors = [];
if (!empty($_POST)) {
    $user->setUsername($_POST['username']);
    $errors['password'] = 'Identifiant ou mot de passe incorrect';

    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $table = new UserTable(ConfigDB::getDatabase());
        try {
            $u = $table->findParUsername($_POST['username']);
            if (password_verify($_POST['password'], $u->getPassword()) === true) {
                session_start();
                $_SESSION['auth'] = $u->getId();
                if($_SESSION['auth'] == true){
                    header('Location: ' . $router->url('dashboard'));
                }else{
                    header('Location: ' . $router->url('profil'));
                }
                exit();
            }
        } catch (NotFoundException $e) { }
    }   
}

$form = new Form($user, $errors);
?>

<form action="<?= $router->url('login') ?>" method="POST">
    <div class="form-group formfull" id="content">
        <?= $form->input('username','Nom d\'utilisateur'); ?>
        <?= $form->input('password','Mot de passe'); ?>
        <div class="text-center"><button class="btn btn-primary" type="submit">Se connecter</button></div>
    </div>
</form>
<div class="text-center">

<!-- Button Facebook -->
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
