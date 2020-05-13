<?php
 $monfichier = fopen('../data/txt/compteur.txt', 'r+');
 $pages_vues = fgets($monfichier);
 $pages_vues ++;
 fseek($monfichier, 0);
 fputs($monfichier, $pages_vues);
 fclose($monfichier);
 echo '<h2><p>Cette page a été vue '.$pages_vues.' fois!</p></h2>';
