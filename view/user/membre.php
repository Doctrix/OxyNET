<?php

use Controller\Auth;
use Server\Connection;

Auth::check();

$titre_header = $titre_navBar = 'Utilisateurs';

$pdo = Connection::getPDO();
$afficher_profil = $pdo->query("SELECT * FROM user");
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
        <td><?= $ap->name ?></td>
        <td><?= $ap->firstname ?></td>
        <td><a href="voir_profil?id=<?= $ap->id ?>">Aller au profil</a></td>
      </tr>
    <?php
    }
  ?>
</table>
<hr/>
