<?php

use App\{Auth,Router,Session};
use App\Server\ConfigDB;

$db = ConfigDB::getDatabase();
$auth = new Auth($db);

if($auth->confirm($db, $_GET['id'], $_GET['token'], Session::getInstance())){
    Session::getInstance()->setSuccess("Votre compte a bien été validé");
    Router::redirect('profil');

}else{
    Session::getInstance()->setErreur("Ce token n'est plus valide");
    Router::redirect('login');
}
