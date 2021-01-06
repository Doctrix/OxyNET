<?php

function nav_item(string $code, string $action, string $url, string $title, string $linkClass = ''): string
{
    $class = 'nav-item';
    if($_SERVER['REQUEST_URI'] === $url){
        $class .= 'active';
    }
    return <<<HTML
    <li class="$class">
        <$code class="$linkClass" $action="$url">$title</$code>
    </li>
HTML;
}

function nav_menu(string $linkClass = ''): string
{
    return
    nav_item('a', 'href', '/', 'HOME', $linkClass).
    nav_item('a', 'href', '/blog/category/jeux-video-1', 'GAMES', $linkClass).
    nav_item('a', 'href', '/blog/category/serveur-2', 'SERVEUR', $linkClass).
    nav_item('a', 'href', '/login', 'Se Connecter', $linkClass);
}

function nav_menu_user(string $linkClass = '', string $linkClassAdv = 'navbar-toggler navbar-nav mt-2 mt-lg-1 navbar-collapse'): string
{
    return
    nav_item('a', 'href', '/', 'HOME', $linkClass).
    nav_item('a', 'href', '/profil', 'Mon profil', $linkClassAdv).
    nav_item('a', 'href', '/profil/dashboard', 'Mon tableau de bord', $linkClassAdv).
    nav_item('a', 'href', '/logout', 'Déconnexion', $linkClassAdv);
}

function nav_menu_admin(string $linkClass = ''): string
{
    return
    nav_item('a', 'href', '/admin', 'Tableau de bord', $linkClass).
    nav_item('a', 'href', '/admin/post', 'Articles', $linkClass).
    nav_item('a', 'href', '/admin/category', 'Catégories', $linkClass).
    nav_item('a', 'href', '/media', 'Média', $linkClass).
    nav_item('a', 'href', '/logout', 'Deconnexion', $linkClass);
}
?>
