<?php
use App\Auth;
use App\Model\User;
use App\Server\ConfigDB;

$titre_navBar = 'tableau de bord';
if(Auth::$session['user']) {
    Auth::Verifier();
    exit();
}

$pdo = ConfigDB::getDatabase();
$utilisateur = new User();

$afficher_profil = $pdo->query("SELECT * FROM utilisateur");
$afficher_profil = $afficher_profil->fetch();

$titre_header = 'Tableau de bord de ' . $afficher_profil->username;
$titre_navBar = $afficher_profil->nom .' '. $afficher_profil->username; 
?>
<p>image : <img src="D:\WinNMP\WWW\OxyNet\src\data\img\OxyGames.png" alt=""></p>
<p>texte : </p>