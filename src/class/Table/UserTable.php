<?php
namespace App\Table;
use App\Model\User;
use App\Table\Exception\NotFoundException;

final class UserTable extends Table {

    protected $table = "utilisateur";
    protected $class = User::class;

    public function trouverParUsername(string $username)
    {
        $query = $this->pdo->prepare('SELECT * FROM '.$this->table.' WHERE username = :username');
        $query->execute(['username' => $username]);
        $query->setFetchMode(\PDO::FETCH_CLASS, $this->class);
        $result = $query->fetch();
        if ($result === false) {
            throw new NotFoundException($this->table, $username);
        }
        return $result;
    }

}