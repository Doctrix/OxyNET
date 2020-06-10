<?php
function nav_item(string $code, string $action, string $url, string $titre, string $linkClass = ''): string
{
    $class = 'nav-item';
    if($_SERVER['REQUEST_URI'] === $url){
        $class .= 'active';
    }
    return <<<HTML
    <li class="$class">
        <$code class="$linkClass" $action="$url">$titre</$code>
    </li>
HTML;
}

function nav_menu(string $linkClass = ''): string
{
    return
    nav_item('a', 'href', '/', 'HOME', $linkClass).
    nav_item('a', 'href', '/login', 'Connexion', $linkClass);
}

function nav_menu_user(string $linkClass = '', string $linkClassUser = 'navbar-toggler navbar-nav mt-2 mt-lg-1 navbar-collapse', string $style = 'background:transparent; border:none;'): string
{
    return
    nav_item('a', 'href', '/user', 'Mon Tableau de bord', $linkClassUser).
    nav_item('a', 'href', '/logout', 'Mes Articles', $linkClassUser).
    nav_item("form method='post'", 'action', 'logout', "<button type='submit' class='$linkClassUser' style='$style'>Déco</button>", $linkClass);
}

function nav_menu_admin(string $linkClass = '', string $linkClassAdmin = 'navbar-toggler navbar-nav mt-2 mt-lg-1 navbar-collapse', string $style = 'background:transparent; border:none;'): string
{
    
    return
    nav_item('a', 'href', '/admin', 'Tableau de bord', $linkClassAdmin).
    nav_item('a', 'href', '/admin/articles', 'Articles', $linkClassAdmin).
    nav_item('a', 'href', '/admin/categories', 'Catégories', $linkClassAdmin).
    nav_item("form method='post'", 'action', 'logout', "<button type='submit' style='$style'>Déconnexion</button>",$linkClassAdmin);
}