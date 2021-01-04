<?php 
namespace Classe\Model;

class User {

    /**
     * @var int
     */
    public $id;
    
    /**
     * @var string
     */
    public $username;

    /**
     * @var string
     */
    public $password;

    /**
     * @var int
     */
    public $role;

    public function obtenirUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function obtenirPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getRole(): ?int
    {
        return $this->role;
    }

    public function setRole(int $role): self
    {
        $this->role = $role;

        return $this;
    }
}