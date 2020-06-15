<?php

namespace App;

use App\Security\ForbiddenException;

class Auth {


    public function __construct()
    {
    }
    
    public static function Verifier()
    {
        if(session_status() === PHP_SESSION_NONE) {
            session_set_cookie_params(86400, dirname($_SERVER['REQUEST_URI']));
            session_start();
        }
        if(!isset($_SESSION['auth'])) {
            throw new ForbiddenException();
        } 
    }

    public function register($db,$username,$password,$email,$date_de_creation)
    {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $token = StrRandom::random(60);
        $db->query("INSERT INTO users SET username = ?, password = ?, email = ?, confirmation_token = ?", [
            $username, 
            $password, 
            $email, 
            $token, 
            /*$date_de_creation */
        ]);
        $user_id = $db->lastInsertId();
        mail($_POST['email'], 'Confirmation de votre compte', "Afin de valider votre compte merci de cliquer sur ce lien\n\nhttps://serveur.oxygames.fr/confirm?id=$user_id&$token");
    }


    public function confirm($db,$user_id, $token, $session)
    {
        $user = $db->query('SELECT * FROM utilisateur WHERE id = ?', [$user_id])->fetch();
        if($user && $user->confirmation_token == $token){
            $db->query('UPDATE utilisateur SET confirmation_token = NULL, confirmed_at = NOW( WHERE id = ?', [$user_id]);
            $session->write('auth', $user);
            return true;
        }
        return false;
    }

    public static function roleUSer()
    {
        if(isset($_SESSION['auth']->slug)) {
            return $_SESSION['auth']->slug;

        } else {
            return false;
        }
    }

 /*    public function logged_only($router)
    {
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        if(!isset($_SESSION['auth'])) {
            $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page";
            header('Location: ' . $router->url('login'));
            exit();
        }
    } */
}

