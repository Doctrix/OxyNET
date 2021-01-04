<?php

use App\{Auth,Router,Session,Validator};
use App\Server\ConfigDB;


$db = ConfigDB::getDatabase();
$user = $db->query('SELECT * FROM utilisateur')->fetchAll();

if(!empty($_POST)) {

    $errors = array();

    $db =  ConfigDB::getDatabase();
    $validator = new Validator($_POST);
    $validator->isAlpha('username', "Votre pseudo n'est pas valide (alphanumérique)");
    
    if ($validator->isValid()){
        $validator->isUniq('username', $db, 'utilisateur', 'Ce pseudo est déja pris');
    }

    $validator->isEmail('email', "Votre email n'est pas valide");
    if ($validator->isValid()){
        $validator->isUniq('email', $db, 'email', 'Cet email est déja utilisé pour un autre compte');
    }

    $validator->isConfirmed('password', 'Vous devez rentrer un mot de passse valide');

    echo '<pre>';
    var_dump($validator);
    var_dump($validator->isValid());
    echo '</pre>';
    die();

    if ($validator->isValid()) {

        $auth = new Auth($db,'auth');
        $auth->register($db, $_POST['username'], $_POST['password'], $_POST['email'], $_POST['date_de_creation']);
        Session::getInstance()->setSuccess('Un email de confirmation vous a été envoyé pour valider votre compte');
        Router::redirect('login');

    } else {
        $errors = $validator->getErrors();
    }

}
?>
<div class="card">
    <div class="card-body">
        <h1>S'inscrire</h1>
        <?php if(!empty($errors)): ?>
        <div class="alert alert-danger">
            <p>Vous n'avez pas rempli le formulaire correctement</p>
        </div>
        <ul>
        <?php foreach($errors as $error): ?>
            <li><?= $error; ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Pseudo</label>
                <input type="text" name="username" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Mot de passe</label>
                <input type="password" name="password" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Confirmez votre mot de passe</label>
                <input type="password" name="password_confirm" id="" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary" value="Enregistrer">M'INSCRIRE</button>
        </form>
    </div>
</div>
