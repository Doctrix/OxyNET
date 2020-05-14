<?php 
$title = 'Profil';
require 'header.php'; 
require 'verification.php';
?>
<div id="content">
<!-- tester si l'utilisateur est connecté -->
<?php
    session_start();
    
    if($_SESSION['user_login'] !== ""){
        $user = $_SESSION['user_login'];
        // afficher un message
        echo "Bonjour $user, vous êtes connecté";
    }
?>

</div>

<div id="content">

<a href='profil.php?deconnexion=true'><span>Déconnexion</span></a>

<!-- tester si l'utilisateur est connecté -->
<?php
    session_start();
    if(isset($_GET['deconnexion']))
    { 
        if($_GET['deconnexion']==true)
        {  
            session_unset();
            header("location:connexion.php");
        }
    }
    else if($_SESSION['user_login'] !== ""){
        $user = $_SESSION['user_login'];
        // afficher un message
        echo "<br>Bonjour $user, vous êtes connectés";
    }
?>

</div>

<?php require 'footer.php';?>