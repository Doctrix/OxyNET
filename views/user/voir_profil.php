<?php
use App\Auth;
use App\ConnexionServeur;
use App\Model\User;
  
Auth::Verifier();
  
$pdo = ConnexionServeur::obtenirPDO();

// On récupère les informations de l'utilisateur grâce à son ID
$afficher_profil = $pdo->query("SELECT * FROM utilisateur");
$afficher_profil = $afficher_profil->fetch();
if(!isset($afficher_profil['id'])) {
header('Location: user');
exit;
}

$titre_header = $titre_navBar = 'Le Profil de ' . $afficher_profil['username']; 
?>

<h2>Voici le profil de <?= $afficher_profil['nom'] . " " .  $afficher_profil['prenom']; ?></h2><div>Quelques informations sur lui : </div>          

    <ul>                                            

      <li>Son adresse mail est : <?= $afficher_profil['email'] ?></li>                              

      <li>Son compte a été crée le : <?= $afficher_profil['date_creation_compte'] ?></li>                                        

    </ul>                                                                                                      
