<?php
 $monfichier = fopen(dirname(__DIR__)

 . DIRECTORY_SEPARATOR . 'data'
 . DIRECTORY_SEPARATOR . 'compteur.txt', 'r+');
 $pages_vues = fgets($monfichier);
 $pages_vues ++;
 fseek($monfichier, 0);
 fputs($monfichier, $pages_vues);
 fclose($monfichier);
 echo '<p>Le site a été vue '.$pages_vues.' fois depuis sa création 13/05/2020</p>';
