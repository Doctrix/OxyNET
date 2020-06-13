<?php
use App\Auth;
use App\ConnexionServeur;

Auth::Verifier();

$pdo = ConnexionServeur::obtenirPDO();


$afficher_profil = $pdo->query("SELECT * 

FROM utilisateur");

$afficher_profil = $afficher_profil->fetchAll();

$titre_header = $titre_navBar = 'Utilisateurs';
?>
<table>

  <tr>

    <th>Nom</th> 

    <th>Prénom</th>

    <th>Voir le profil</th>

  </tr>

  <?php

    // Foreach agit comme une boucle mais celle-ci s'arrête de façon intelligente. 

    // Elle s'arrête avec le nombre de lignes qu'il y a dans la variable $afficher_profil

    // La variable $afficher_profil est comme un tableau contenant plusieurs valeurs

    // pour lire chacune des valeurs distinctement on va mettre un pointeur que l'on appellera ici $ap

    foreach($afficher_profil as $ap){

    ?>

      <tr>          

        <td><?= $ap['nom'] ?></td>

        <td><?= $ap['prenom'] ?></td>

        <td><a href="voir_profil?id=<?= $ap['id'] ?>">Aller au profil</a></td>

      </tr>

    <?php

    }

  ?>

</table>
<hr/>
