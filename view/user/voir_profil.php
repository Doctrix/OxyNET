<?php

use App\Auth;
use Server\ConfigDB;

Auth::Verifier();
  
$pdo = ConfigDB::getDatabase();

// On récupère les informations de l'utilisateur grâce à son ID
$afficher_profil = $pdo->query("SELECT * FROM utilisateur WHERE id");
$afficher_profil = $afficher_profil->fetch();
if(!isset($afficher_profil->id)) {
header('Location: ' . $router->url('user'));
exit;
}

$titre_header = $titre_navBar = 'Le Profil de ' . $afficher_profil->username; 
?>

<h2>Voici le profil de <?= $afficher_profil->nom . " " .  $afficher_profil->prenom ?></h2><div>Quelques informations sur lui : </div>          

    <ul>                                            

      <li>Son adresse mail est : <?= $afficher_profil->email ?></li>                              

      <li>Son compte a été crée le : <?= $afficher_profil->date_creation_compte ?></li>                                        

    </ul>                                                                                                      
