<?php

use App\Auth;
use App\GuestBook;
use App\Message;

Auth::Verifier();

$errors = null;
$success = false;
$guestbook = new GuestBook(__DIR__ . DS . 'data' . DS .'messages');
if (isset($_POST['username'], $_POST['message'])) {
    $message = new Message($_POST['username'], $_POST['message']);
    if ($message->isValid()) {
        $guestbook->ajouterUnMessage($message);
        $success = true;
        $_POST = []; 
    } else {
        $errors = $message->obtenirErrors();
    }
}
$messages = $guestbook->obtenirLeMessage();
$titre_header = "Boite à message";
$titre_navBar = "Ecris ton message";
?>

<div class="container">
    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            Formulaire invalide !
        </div>
    <?php endif ?>

    <?php if ($success): ?>
        <div class="alert alert-success">
            Merci pour ton message !
        </div>
    <?php endif ?>
<!-- Fomulaire de message -->
    <form action="" method="post">
        <div class="form-group">  
            <input value="<?= e($_POST['username'] ?? '') ?>" type="text" name="username" placeholder="Votre pseudo" class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>">
            <?php if (isset($errors['username'])): ?>
                <div class="invalid-feedback"><?= $errors['username'] ?></div>
            <?php endif ?>
        </div>
        <div class="form-group">
            <textarea name="message" placeholder="Votre message" class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>"><?= e($_POST['message'] ?? '') ?></textarea>
            <?php if (isset($errors['message'])): ?>
                <div class="invalid-feedback"><?= $errors['message'] ?></div>
            <?php endif ?>
        </div>
        <button class="btn btn-primary">Envoyer</button>
    </form>
    <div class="formfull bg-light">
    <?php if (!empty($messages)): ?>
        <h1 class="mt-4"><strong>✉️Les Messages</strong></h1>
    <?php foreach($messages as $message): ?>
    <?= $message->toHTML() ?>
    <?php endforeach ?>

    <?php endif ?>
    </div>
</div>


