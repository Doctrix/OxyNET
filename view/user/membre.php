<?php

use Model\Auth;
use Model\Server\ConfigDB;

Auth::Verifier();

$titre_header = $titre_navBar = 'Utilisateurs';

$pdo = ConfigDB::getDatabase();
$afficher_profil = $pdo->query("SELECT * FROM utilisateur");
$afficher_profil = $afficher_profil->fetchAll();

?>
<table>
  <tr>
    <th>Nom</th> 
    <th>Prénom</th>
    <th>Voir le profil</th>
  </tr>

  <?php
    foreach($afficher_profil as $ap){
    ?>
      <tr>          
        <td><?= $ap->nom ?></td>
        <td><?= $ap->prenom ?></td>
        <td><a href="voir_profil?id=<?= $ap->id ?>">Aller au profil</a></td>
      </tr>
    <?php
    }
  ?>
</table>
<hr/>
