<?php
use App\Auth;
use App\Model\User;
use App\Server\ConfigDB;

Auth::Verifier();

$pdo = ConfigDB::getDatabase();
$utilisateur = new User();

$afficher_profil = $pdo->query("SELECT * FROM utilisateur");
$afficher_profil = $afficher_profil->fetch();

$titre_header = $afficher_profil->username;
$titre_navBar = $afficher_profil->nom; 
?>
<th>
 
</th>
<h2>Vos informations :</h2>
    <div>Informations personnel : </div>
    <ul>
      <p>plein ecran</p>
    <li>Stream deck for Raspberry pi</li>
    </ul>
<hr/>
