<?php
namespace App;

use PDO;

class ConnexionServeur {
    
    public static function obtenirPDO(): PDO
    {
        require LIB.DS.'ConfigDB.php';
        $db_user = DB_USER;
        $db_password = DB_PASSWORD;
        return new PDO('mysql:host=' . DB_HOST .';dbname=' . DB_NAME, $db_user, $db_password, [
            PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
        ]);
    }
}
?>