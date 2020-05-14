<?php
if (!function_exists('nav_item')) {

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
}
?>

<?= nav_item('/index.php', 'Accueil', $class); ?>
<?= nav_item('/blog.php', 'Blog', $class); ?>
<?= nav_item('/connexion.php', 'Connexion', $class); ?>
<?= nav_item('/game.php', 'Game', $class); ?>
<?= nav_item('/contact.php', 'Contact', $class); ?>
