<?php
$fichier = dirname(__DIR__,2) 
. DIRECTORY_SEPARATOR . 'content' 
. DIRECTORY_SEPARATOR . 'uploads' 
. DIRECTORY_SEPARATOR . 'txt' 
. DIRECTORY_SEPARATOR . 'test.txt';
$size = @file_put_contents($fichier, 'Hello ! ', FILE_APPEND);
if ($size === false) {
    echo 'Impossible d\'écrire dans le fichier';
} else {
    echo 'Ecriture réussie';
}