<?php 

namespace Controller;

class GuestBook {

    private $fichier;

    public function __construct(string $fichier)
    {
        $dossier = dirname($fichier);
        if (!is_dir($dossier)) {
            mkdir($dossier, 0777, true);
        }
        if (!file_exists($fichier)) {
            touch($fichier);
        }
        $this->fichier = $fichier;
    }

    public function addMessage(Message $message): void
    {
        file_put_contents($this->fichier, $message->toJSON() . PHP_EOL, FILE_APPEND);
    }

    public function getMessage(): array
    {
        $content = trim(file_get_contents($this->fichier));
        $lignes = explode(PHP_EOL, $content);
        $messages = [];
        foreach ($lignes as $ligne) {
            $messages[] = Message::fromJSON($ligne);
        }
        return array_reverse($messages); 
    }
} // GuestBook
