<?php

use Controller\Auth;
use Server\Connection;

Auth::check();
  
$pdo = Connection::getPDO();

// On récupère les informations de l'utilisateur grâce à son ID
$afficher_profil = $pdo->query("SELECT * FROM user WHERE id");
$afficher_profil = $afficher_profil->fetch();
if(!isset($afficher_profil->id)) {
header('Location: ' . $router->url('user'));
exit;
}

$titre_header = $titre_navBar = 'Le Profil de ' . $afficher_profil->username; 
?>

<h2>Voici le profil de <?= $afficher_profil->name . " " .  $afficher_profil->firstname ?></h2><div>Quelques informations sur lui : </div>          

    <ul>                                            

      <li>Son adresse mail est : <?= $afficher_profil->email ?></li>                              

      <li>Son compte a été crée le : <?= $afficher_profil->created_at_account ?></li>                                        

    </ul>                                                                                                      
