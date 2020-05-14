<?php
session_start();
if (!isset($_SESSION['login'])) {header ('Location: index.php');exit();}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />    
<title>Espace membre</title>
<meta name="robots" content="noindex, nofollow">
</head>
<body>
<p><strong>ESPACE MEMBRES</strong><br/>
Bienvenue <?php echo htmlentities(trim($_SESSION['login'])); ?> !<br/>
<a href="deconnexion.php">Déconnexion</a>
</p>
</body>
</html>
