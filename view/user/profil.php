<?php

use Model\Auth;
use Model\Classes\User;
use Model\Server\ConfigDB;

Auth::Verifier();

$pdo = ConfigDB::getDatabase();
$utilisateur = new User();

$afficher_profil = $pdo->query("SELECT * FROM utilisateur");
$afficher_profil = $afficher_profil->fetch();

$titre_header = $afficher_profil->username;
//$titre_navBar = $afficher_profil->nom; 
?>
<th>
 
</th>
<h2>Vos informations :</h2>
    <div>Informations personnel : </div>
    <ul>
    <li>Votre pseudo : <?= $afficher_profil->username ?></li>
      <li>Votre id est : <?= $afficher_profil->id ?></li>
      <li>Votre mail est : <?= $afficher_profil->email ?></li>
      <li>Votre compte a été crée le : <?= $afficher_profil->date_creation_compte ?></li>
    </ul>
<hr/>