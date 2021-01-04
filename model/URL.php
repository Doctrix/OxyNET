<?php

namespace Classe;

class URL {

    public static function obtenirInt(string $titre, ?int $default = null): ?int
    {
        if(!isset($_GET[$titre])) return $default;
        if($_GET[$titre] === '0') return 0;

        if (!filter_var($_GET[$titre], FILTER_VALIDATE_INT)) {
            throw new \Exception("Le parametre $titre dans l'url n'est pas un entier");
        }
        return (int)$_GET[$titre];
    }

    public static function obtenirPositiveInt(string $titre, ?int $default = null): ?int
    {
        $param = self::obtenirInt($titre, $default);
        if ($param !== null && $param <= 0) {
            throw new \Exception("Le parametre $titre dans l'url n'est pas un entier positif");
        }
        return $param;
    }
}