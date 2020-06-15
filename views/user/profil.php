<?php
use App\Auth;
use App\ConnexionServeur;
use App\Model\User;
use App\Server\ConfigDB;

Auth::Verifier();

$pdo = ConfigDB::getDatabase();

$user = new User($pdo);

$afficher_profil = $pdo->query("SELECT * 
FROM utilisateur"
);

$afficher_profil = $afficher_profil->fetch();

$titre_navBar = $afficher_profil['username'];
?>
<th>
 
</th>
<h2>Voici le profil de <?= $afficher_profil['nom'] . ' ' . $afficher_profil['prenom']; ?></h2>
    <div>Quelques informations sur vous : </div>
    <ul>
    <li>Votre pseudo : <?= $afficher_profil['username'] ?></li>
      <li>Votre id est : <?= $afficher_profil['id'] ?></li>
      <li>Votre mail est : <?= $afficher_profil['email'] ?></li>
      <li>Votre compte a été crée le : <?= $afficher_profil['date_creation_compte'] ?></li>
    </ul>
<hr/>
