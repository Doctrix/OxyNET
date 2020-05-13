<?php
$title = 'Game';
$secret = 360;
$erreur = null;
$succes = null;
if (isset($_GET['chiffre'])) {
    if ($_GET['chiffre'] > $secret) {
        $erreur = <<<HTML
        Trop GRAND
HTML;
    } elseif ($_GET['chiffre'] < $secret) {
        $erreur = <<<HTML
        Trop petit
HTML;
    } else {
        $succes = <<<HTML
        BRAVO !!! le chiffre secret est bien $secret.
HTML;
    }
}
require 'header.php';
?>

<?php 

if (isset($_GET['chiffre'])):?>
    <?php if ($_GET['chiffre'] > $secret): ?>
        <div class="game-lose">
        Trop GRAND
        </div>
        <?php elseif ($_GET['chiffre'] < $secret): ?>
        <div class="game-lose">
        Trop petit
        </div>    
        <?php else: ?>
        <div class="game-win">
        BRAVO !!! le chiffre secret est bien <?= $secret ?>.
        </div>    
    <?php endif ?>
<?php endif ?>
<br>
<form action="/game.php" method="GET">
    <input type="number" name="chiffre" placeholder="entre 0 et 10000" value="<?php if (isset($_GET['chiffre'])) { echo htmlentities($_GET['chiffre']); } ?>">
    <button type="submit">Guess</button>
</form>

