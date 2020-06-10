<?php
namespace App\Model;

class User {

    /**
     * @var int
     */
    private $id;
    
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

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
}