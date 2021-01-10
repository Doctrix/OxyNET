<?php
namespace Table;

use Model\User;
use Table\Exception\NotFoundException;
use PDO;

final class UserTable extends Table
{
    protected $table = "user";
    protected $tableRole = "role";
    protected $class = User::class;

    public function findForUsername(string $username)
    {
        $query = $this->pdo->query('SELECT * FROM ' . $this->table . ' LEFT JOIN role ON user.role_id=role.id WHERE username = username');
        $query->execute(['username' => $username]);
        $query->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $result = $query->fetch();
        if ($result === false) {
            throw new NotFoundException($this->table, $username);
        }
        return $result;
    }

    public function findForRole(string $role)
    {
        $query = $this->pdo->prepare('SELECT * FROM ' . $this->tableRole);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $result = $query->fetch();
        $roles = array();
        foreach ($result as $r) {
            $roles[$r->slug]=$r->level;
        }
        if ($result === false) {
            throw new NotFoundException($this->tableRole, $role);
        }
        return $result;
    }
}
