<?php

//on inclue un fichier contenant nom_de_serveur, nom_bdd, login et password d'accès à la bdd mysql
include ("config.php");
//on vérifie que le visiteur a correctement saisi puis envoyé le formulaire
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
if ((isset($_POST['nom']) && !empty($_POST['nom'])) && (isset($_POST['mdp']) && !empty($_POST['mdp']))) {
//on se connecte à la bdd
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD); 
if (!$db) {
   echo "LA CONNEXION AU SERVEUR MYSQL A ECHOUE\n";
   exit;
}
mysqli_select_db($db,DB_NAME);
print "Connexion BDD reussie puis";
echo "<br/>";

//on parcourt la bdd pour chercher l'existence du login mot et du mot de passe saisis par l'internaute 
//et on range le résultat dans le tableau $data
$requete = 'SELECT count(*) FROM $tables_prefix->users WHERE id="'.mysqli_real_escape_string($db,htmlspecialchars($_POST['nom'])).'" 
AND md5="'.mysqli_real_escape_string($db,htmlspecialchars(md5($_POST['mdp']))).'"';
$exec_requete = mysqli_query($db,$requete) or die('Erreur SQL !<br />'.$requete.'<br />'.mysqli_error($erreur));
$data = mysqli_fetch_array($exec_requete);
mysqli_free_result($exec_requete);
mysqli_close($db);
/* 
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        or die('could not connect to database');
    $nom = mysqli_real_escape_string($db,htmlspecialchars($_POST['nom'])); 
    $mdp = mysqli_real_escape_string($db,htmlspecialchars($_POST['mdp']));
    
    if($nom !== "" && $mdp !== "")
    {
        $requete = "SELECT count(*) FROM wptest_users where 
              user_login = '".$nom."' and user_pass = '".$mdp."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['nom'] = $nom;
           header('Location: profil.php');
        }
        else
        {
           header('Location: connexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: connexion.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: connexion.php');
}
mysqli_close($db); // fermer la connexion */
  

// si on obtient une réponse, alors l'utilisateur est un membre
//on ouvre une session pour cet utilisateur et on le connecte à l'espace membre
if ($data[0] == 1){
session_start();
$_SESSION['nom'] = $_POST['nom'];
header('Location: profil.php');
exit();
}
//si le visiteur a saisi un mauvais login ou mot de passe, on ne trouve aucune réponse
elseif ($data[0] == 0) {
$erreur = 'Login ou mot de passe non reconnu !';
echo $erreur; 
echo"<br/><a href=\"connexion.php\">connexion</a>";
exit();
}
// sinon, il existe un problème dans la base de données
else {
$erreur = 'Plusieurs membres ont<br/>les memes login et mot de passe !';
echo $erreur; 
echo"<br/><a href=\"connexion.php\">connexion</a>";
exit();
}}
else {
$erreur = 'Errreur de saisie !<br/>Au moins un des champs est vide !'; 
echo $erreur; 
echo"<br/><a href=\"connexion.php\">connexion</a>";
exit();
}}



?> 