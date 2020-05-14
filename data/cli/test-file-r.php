<?php
$fichier = dirname(__DIR__,2) 
. DIRECTORY_SEPARATOR . 'content' 
. DIRECTORY_SEPARATOR . 'uploads' 
. DIRECTORY_SEPARATOR . 'txt' 
. DIRECTORY_SEPARATOR . 'test.txt';
echo file_get_contents($fichier);