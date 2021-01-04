<?php

use Model\Auth;
use Model\Classes\User;
use Model\Server\ConfigDB;

if(Auth::$session['auth']) {
  Auth::Verifier();
  exit(); 
}

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
      <p><button class="btn btn-info">
        <?php if (Auth::$session['auth'] == Auth::$session['admin'] ): ?>
            Plein écran
        <?php else: ?>
            Réduire
        <?php endif ?>
    </button></p>
    <button class="btn btn-info">name button 1</button>
    <button class="btn btn-info">name button 2</button>
    <button class="btn btn-info">name button 3</button>
    <button class="btn btn-info">name button 4</button>
    </ul>
<hr/>
