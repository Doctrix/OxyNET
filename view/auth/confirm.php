<?php

use App\{Auth,Session};
use Framework\Router;
use Server\ConfigDB;

$db = ConfigDB::getDatabase();
$auth = new Auth($db);

if($auth->confirm($db, $_GET['id'], $_GET['token'], Session::getInstance(), Router::redirect())){
    Session::getInstance()->setSuccess("Votre compte a bien été validé");
    Router::redirect('profil');

}else{
    Session::getInstance()->setErreur("Ce token n'est plus valide");
    Router::redirect('login');
}
