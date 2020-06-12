<?php

namespace App;

use App\Security\ForbiddenException;

class Auth {
    
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

    public static function roleUSer()
    {
        if(isset($_SESSION['auth']->slug)){
            return $_SESSION['auth']->slug;

        } else {
            return false;
        }
    }
}