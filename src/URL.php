<?php

namespace App;

class URL {

    public static function getInt(string $title, ?int $default = null): ?int
    {
        if(!isset($_GET[$title])) return $default;
        if($_GET[$title] === '0') return 0;

        if (!filter_var($_GET[$title], FILTER_VALIDATE_INT)) {
            throw new \Exception("Le parametre $title dans l'url n'est pas un entier");
        }
        return (int)$_GET[$title];
    }

    public static function getPositiveInt(string $title, ?int $default = null): ?int
    {
        $param = self::getInt($title, $default);
        if ($param !== null && $param <= 0) {
            throw new \Exception("Le parametre $title dans l'url n'est pas un entier positif");
        }
        return $param;
    }
}