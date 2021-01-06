<?php

use App\Auth;
use Server\Connection;

Auth::check();

$pdo = Connection::getPDO();
$afficher_profil = $pdo->query("SELECT * FROM user");
$afficher_profil = $afficher_profil->fetch();
$titre_header = $afficher_profil->username;
?>

<th>
 
</th>
<h2>Vos informations :</h2>
    <div>Informations personnel : </div>
    <ul>
    <li>Votre pseudo : <?= $afficher_profil->username ?></li>
      <li>Votre id est : <?= $afficher_profil->id ?></li>
      <li>Votre mail est : <?= $afficher_profil->email ?></li>
      <li>Votre compte a été crée le : <?= $afficher_profil->created_at_account ?></li>
    </ul>
<hr/>
