<?php
$fichier = dirname(__DIR__,2) 
. DIRECTORY_SEPARATOR . 'content' 
. DIRECTORY_SEPARATOR . 'uploads' 
. DIRECTORY_SEPARATOR . 'txt' 
. DIRECTORY_SEPARATOR . 'test.csv';
$resource = fopen($fichier, 'r+');
$k = 0;
while ($lignes = fgets($resource)){
    $k++;
    if ($k === 5) {
        fwrite($resource, 'Follow');
    break;
    }
}
fclose($resource);