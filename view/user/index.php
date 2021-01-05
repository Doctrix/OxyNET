<?php

use App\Auth;
use Model\User;
use Server\ConfigDB;

$titre_navBar = 'tableau de bord';
if(Auth::$session['user']) {
    Auth::Verifier();
    exit();
}

$pdo = ConfigDB::getDatabase();
$user = new User();

$afficher_profil = $pdo->query("SELECT * FROM user");
$afficher_profil = $afficher_profil->fetch();

$titre_header = 'Tableau de bord de ' . $afficher_profil->username;
$titre_navBar = $afficher_profil->name .' '. $afficher_profil->username; 
?>
<p>image : <img src="<?= DATA . DS . 'img\OxyGames.png'; ?>" alt=""></p>
<p>texte : </p>