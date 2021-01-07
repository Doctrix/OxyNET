<?php

namespace Controller;

class Picture {

	static function creerMin($img, $chemin, $name, $mlargeur=100, $mhauteur=100){
		// On supprime l'extension du nom
		$name = substr($name, 0, -4);
		// On récupère les dimensions de l'image
		$dimension = getimagesize($img);
		// On cré une image à partir du fichier récup
		if(substr(strtolower($img), -4) == ".jpg"){$picture = imagecreatefromjpeg($img); }
		else if(substr(strtolower($img), -4) == ".png"){$picture = imagecreatefrompng($img); }
		else if(substr(strtolower($img), -4) == ".gif"){$picture = imagecreatefromgif($img); }
		// L'image ne peut etre redimensionne
		else{return false; }
		
		// Création des miniatures
		// On cré une image vide de la largeur et hauteur voulue
		$miniature = imagecreatetruecolor ($mlargeur, $mhauteur); 
		// On va gérer la position et le redimensionnement de la grande image
		if($dimension[0]>($mlargeur/$mhauteur)*$dimension[1]){ $dimY=$mhauteur; $dimX=$mhauteur*$dimension[0]/$dimension[1]; $decalX=-($dimX-$mlargeur)/2; $decalY=0;}
		if($dimension[0]<($mlargeur/$mhauteur)*$dimension[1]){ $dimX=$mlargeur; $dimY=$mlargeur*$dimension[1]/$dimension[0]; $decalY=-($dimY-$mhauteur)/2; $decalX=0;}
		if($dimension[0]==($mlargeur/$mhauteur)*$dimension[1]){ $dimX=$mlargeur; $dimY=$mhauteur; $decalX=0; $decalY=0;}
		// on modifie l'image crée en y plaçant la grande image redimensionné et décalée
		imagecopyresampled($miniature, $picture, $decalX, $decalY, 0, 0, $dimX, $dimY, $dimension[0], $dimension[1]);
		// On sauvegarde le tout
		imagejpeg($miniature,$chemin."/".$name.".jpg",90);
		return true;
	}

	static function ConvertirJPG($img){
	if(substr(strtolower($img),-4)==".jpg"){$picture = imagecreatefromjpeg($img); }
		else if(substr(strtolower($img),-4)==".png"){$picture = imagecreatefrompng($img); }
		else if(substr(strtolower($img),-4)==".gif"){$picture = imagecreatefromgif($img); }
		else{return false; }
		unlink($img);
		imagejpeg($picture, substr($img,0,-3)."jpg",90);
		return true;
	}
}


