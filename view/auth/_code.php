<?php

use App\HTML\Form;
use Server\Connection;
use Model\User;
use Table\Exception\NotFoundException;
use Table\UserTable;

session_start();
if(isset($_SESSION['auth'])) {
    header('Location: ' . $router->url('dashboard'));
    exit();
}

$user = new User;
$errors = [];
if(!empty($_POST)) {
    $user->setUsername($_POST['username']);
    $errors['password'] = 'Identifiant ou mot de passe incorrect';

    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $table = new UserTable(Connection::getPDO());
        try {
            $u = $table->findForUsername($_POST['username']);
            if (password_verify($_POST['password'], $u->getPassword()) === true) {
                session_start();
                $_SESSION['auth']['id'] = $u->getID();
                header('Location: ' . $router->url('dashboard'));
                exit();
            }
        } catch (NotFoundException $e) {  
        } 
    }
}

$form = new Form($user, $errors);
$titre_header = "Se connecter";
$titre_navBar = "Connexion";
