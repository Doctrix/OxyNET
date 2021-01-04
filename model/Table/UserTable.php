<?php
namespace Model\Table;
use Model\Classes\User;
use Model\Table\Exception\NotFoundException;

final class UserTable extends Table {

    protected $table = "utilisateur";
    protected $tableRole = "role";
    protected $class = User::class;

    public function trouverParUsername(string $username)
    {
        $query = $this->pdo->query('SELECT * FROM ' . $this->table . ' LEFT JOIN role ON utilisateur.role_id=role.id WHERE username = username');
        $query->execute(['username' => $username]);
        $query->setFetchMode(\PDO::FETCH_CLASS, $this->class);
        $result = $query->fetch();
        if ($result === false) {
            throw new NotFoundException($this->table, $username);
        }
        return $result;
    }

    public function trouverParRole(string $role)
    {
        $query = $this->pdo->prepare('SELECT * FROM '.$this->tableRole);
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS, $this->class);
        $result = $query->fetch();
        $roles = array();
        foreach($result as $r){
            $roles[$r->slug]=$r->level;
        }
        if ($result === false) {
            throw new NotFoundException($this->tableRole, $role);
        }
        return $result;
    }

}