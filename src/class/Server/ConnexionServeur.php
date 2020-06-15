<?php

namespace App\Server;

use \PDO;

class ConnexionServeur {
    
    private $pdo;
    private $db_host = DB_HOST;
    private $db_user = DB_USER;
    private $db_password = DB_PASSWORD;
    private $db_name = DB_NAME;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_user, $this->db_password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
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

    public static function obtenirPDO()
    {
        return ConfigDB::getDatabase();
    }

    public function lastInsetId()
    {
        return $this->pdo->lastInsetId();
    }
}
