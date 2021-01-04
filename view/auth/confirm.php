<?php

use Model\{Auth,Session};
use Model\Server\ConfigDB;
use Framework\App;

$db = ConfigDB::getDatabase();
$auth = new Auth($db);

if($auth->confirm($db, $_GET['id'], $_GET['token'], Session::getInstance(), App::redirect())){
    Session::getInstance()->setSuccess("Votre compte a bien été validé");
    App::redirect('profil');

}else{
    Session::getInstance()->setErreur("Ce token n'est plus valide");
    App::redirect('login');
}
