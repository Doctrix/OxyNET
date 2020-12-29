<?php


use App\ConnexionServeur;
use App\HTML\Form;
use App\Model\User;
use App\Table\Exception\NotFoundException;
use App\Table\UserTable;

session_start();
if(isset($_SESSION['auth'])) {
    header('Location: ' . $router->url('dashboard'));
    exit();
}


$utilisateur = new User;
$errors = [];
if(!empty($_POST)) {
    $utilisateur->setUsername($_POST['username']);
    $errors['password'] = 'Identifiant ou mot de passe incorrect';

    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $table = new UserTable(ConnexionServeur::obtenirPDO());
        try {
            $u = $table->trouverParUsername($_POST['username']);
            if (password_verify($_POST['password'], $u->obtenirPassword()) === true) {
                session_start();
                $_SESSION['auth']['id'] = $u->getId();
                header('Location: ' . $router->url('dashboard'));
                exit();
            }
        } catch (NotFoundException $e) {  
        } 
    }
   
}

$form = new Form($utilisateur, $errors);
$titre_header = "Se connecter";
$titre_navBar = "Connexion";
