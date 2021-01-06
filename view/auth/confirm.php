<?php

use Controller\{Auth, Session, App};
use Server\Connection;

$db = Connection::getPDO();
$auth = new Auth($db);

if($auth->confirm($db, $_GET['id'], $_GET['token'], Session::getInstance(), App::redirect())){
    Session::getInstance()->setSuccess("Votre compte a bien été validé");
    App::redirect('profil');

}else{
    Session::getInstance()->setErreur("Ce token n'est plus valide");
    App::redirect('login');
}
