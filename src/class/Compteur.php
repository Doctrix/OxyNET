<?php

namespace App;

class Compteur {

    public static function ajouterUneVue()
    {
        $fichier = DATA.DS.'compteur';
        $compteur = 1;
        if (file_exists($fichier)) {
            $compteur = (int)file_get_contents($fichier);
            $compteur++;
        }
        file_put_contents($fichier, $compteur);
        
    }

    public static function nbrDeVues(): string
    {
        $fichier = DATA.DS.'compteur';
        return file_get_contents($fichier);
    }
}
