<?php

function nav_item (string $url, string $titre, string $linkClass = ''): string
{
    $class = 'nav-item';
    if($_SERVER['SCRIPT_NAME'] === $url){
        $class .= 'active';
    }
    return <<<HTML
    <li class="$class">
        <a class="$linkClass" href="$url">$titre</a>
    </li>
HTML;
}

function nav_menu (string $linkClass = ''): string 
{
    return
    nav_item('/index.php', 'Accueil', $linkClass) .
    nav_item('/blog.php', 'Blog', $linkClass) .
    nav_item('/game.php', 'Game', $linkClass) .
    nav_item('/inventaire.php', 'Inventaire', $linkClass) .
    nav_item('/contact.php', 'Contact', $linkClass);
}

