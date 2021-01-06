<?php

function ajouter_une_vue (): void
{
    $fichier = DATA . DS . 'compteur';
    $fichier_journalier = $fichier . '-' . date('Y-m-d');
    incrementer_compteur($fichier);
    incrementer_compteur($fichier_journalier);
}

function incrementer_compteur(string $fichier): void
{
    $compteur = 1;
    if (file_exists($fichier)) 
    {
        $compteur = (int)file_get_contents($fichier);
        $compteur++;
    }
    file_put_contents($fichier, $compteur);
}

function nbr_de_vues (): string
{
    $fichier = DATA . DS . 'compteur';
    return file_get_contents($fichier);
}

function nbr_de_vues_par_mois(int $annee, int $mois): int
{
    $mois = str_pad($mois, 2, '0', STR_PAD_LEFT);
    $fichier = DATA . DS . 'compteur-' . $annee . '-' . $mois . '-' . '*';
    $fichiers = glob($fichier);
    $total = 0;
    foreach ($fichiers as $fichier){
        $total += (int)file_get_contents($fichier);
    }
    return $total;
}

function nbr_de_vues_detail_par_mois(int $annee, int $mois): array
{
    $mois = str_pad($mois, 2, '0', STR_PAD_LEFT);
    $fichier = DATA . DS . 'compteur-' . $annee . '-' . $mois . '-' . '*';
    $fichiers = glob($fichier);
    $visites = [];
    foreach ($fichiers as $fichier){
        $parties = explode('-', basename($fichier));
        $visites = [
            'annee' => $parties[1], 
            'mois' => $parties[2], 
            'jour' => $parties[3], 
            'visites' => file_get_contents($fichier)
        ];
        return $visites;
    }
}

?>