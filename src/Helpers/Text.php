<?php
namespace Model\Helpers;

class Text {
    
    public static function excerpt(string $contenu, int $limit = 60)
    {
        if(mb_strlen($contenu) <= $limit){
            return $contenu;
        }
        $lastSpace = mb_strpos($contenu, ' ', $limit);
        return mb_substr($contenu, 0, $lastSpace) . '...';
    }
}