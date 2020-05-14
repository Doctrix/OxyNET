<?php
$title = 'Game';
/* $secret = random_int(0,360); aléatoire */
$secret = 32;
$erreur = null;
$succes = null;
$value = null;
if (isset($_POST['chiffre'])) {
    $value = (int)$_POST['chiffre'];
    if ($value > $secret) {
        $erreur = "Trop GRAND";
    } elseif ($value < $secret) {
        $erreur = "Trop petit";
    } else {
        $succes = "BRAVO !!! le chiffre secret est bien $secret.";
    }
}

require 'includes/header.php';
?>

<?php if ($erreur):?>
<div class="alert alert-danger game-lose">
    <?= $erreur ?>
</div>
<?php elseif ($succes): ?>
<div class="alert alert-success game-win">
    <?= $succes ?>
</div>
<?php endif ?>
<br>
<form class="formfull" action="game.php" method="POST">
<div class="form-group">
    <input class="form-control" type="number" name="chiffre" placeholder="entre 0 et 360" value="<?php $value ?>">
</div>
    <button class="btn btn-dark" type="submit">Guess</button>
</formulaire>


<?php require 'includes/footer.php';?>

