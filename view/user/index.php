<?php

use Controller\Auth;
use Model\User;
use Server\Connection;

$titre_navBar = 'tableau de bord';
if(Auth::$session['user']) {
    Auth::check();
    exit();
}

$pdo = Connection::getPDO();
$user = new User();

$afficher_profil = $pdo->query("SELECT * FROM user");
$afficher_profil = $afficher_profil->fetch();

$titre_header = 'Tableau de bord de ' . $afficher_profil->username;
$titre_navBar = $afficher_profil->name .' '. $afficher_profil->username; 
?>
<p>image : <img src="<?= IMAGES . 'OxyGames.png'; ?>" alt=""></p>
<p>texte : </p>