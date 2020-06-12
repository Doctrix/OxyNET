<?php
use App\Auth;
use App\ConnexionServeur;
use App\Model\User;
use App\Table\UserTable;

Auth::Verifier();

$titre_navBar = 'Mon Profil';

$pdo = ConnexionServeur::obtenirPDO();

$user = new User($pdo);
//  à config
?>
<th>
 
</th>
<h2><ul>Informations utilisateur</ul></h2>
<hr/>
<strong>Pages publier :</strong><br>
<strong>Utilisateur inscrits :</strong><br>
<strong>Utilisateur connectés :</strong><br>
<strong>Totale de visite :</strong><br>
<hr/>
