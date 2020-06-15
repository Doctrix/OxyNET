<?php

namespace App\Server;

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'password');
define('DB_NAME', 'db_server');
define('PORT', '3306');

class ConfigDB {

    static $db = null;
    
    static function getDatabase() {

        if(!self::$db)
        {
            self::$db = new ConnexionServeur(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        }
        return self::$db;
    }

}
