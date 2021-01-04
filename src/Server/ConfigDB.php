<?php
namespace Model\Server;

use Model\Auth;
use \PDO;

require LIB . DS . 'DB.php';
class ConfigDB {

    public static $db;
    public static $auth;
    public static $db_user = DB_USER;
    public static $db_password = DB_PASSWORD;
    private $pdo;

    public static function getDatabase(): PDO
    {
        if(!self::$db)
        {
            $db_host = DB_HOST;
            $db_name = DB_NAME;
            self::$db = new PDO("mysql:host={$db_host};dbname={$db_name}", self::$db_user, self::$db_password);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        }
        return self::$db;
    }
    
    public static function getAuth(): Auth
    {
        if(!self::$auth)
        {
            self::$auth = new Auth(self::getDatabase());
        }
        return self::$auth;
    }

        /**
     * @param $query
     * @param bool|array $params
     * @return PDOStatement
     */
    public function query($query, $params = false)
    {
        if($params){
            $req = $this->pdo->prepare($query);
            $req->execute($params);
        } else {
            $req = $this->pdo->query($query);
        }
        return $req;
    }

    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }
}
