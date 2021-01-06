<?php

namespace App;

use DateTime;
use DateTimeZone;

class Message {

    const LIMIT_USERNAME = 3;
    const LIMIT_MESSAGE = 10;
    private $username;
    private $message;
    private $date;


    public static function fromJSON(string $json): Message
    {
        $donnees = json_decode($json, true);
        return new self($donnees['username'], $donnees['message'], new DateTime("@" . $donnees['date']));
    }

    public function __construct(string $username, string $message, \DateTime $date = null) 
    {
        $this->username = $username;
        $this->message = $message;
        $this->date = $date ?: new DateTime();
    }

    public function isValid(): bool
    {
        return empty($this->getErrors());
    }

    public function getErrors(): array
    {
        $errors = [];
        if (strlen($this->username) < self::LIMIT_USERNAME ) {
            $errors['username'] = 'Le pseudo est trop court';
        }
        if (strlen($this->message) < self::LIMIT_MESSAGE ) {
            $errors['message'] = 'Le message est trop court';
        }
        return $errors;
    }


    public function toHTML(): string
    {
        $username = e($this->username);
        $this->date
            ->setTimeZone(new DateTimeZone('Europe/Paris'))
            ->format('H:i');
        $date = $this->date->format('d/m/Y à H:i');
        $message = br_e($this->message);
        return <<<HTML
        <p>
            <strong>{$username}</strong>
            <em>le {$date}</em><br>
            {$message}
        </p>
HTML;
    }


    public function toJSON(): string
    {
        return json_encode([
        'username' => $this->username,
        'message' => $this->message,
        'date' => $this->date->getTimestamp()
        ]);
        
    }
}