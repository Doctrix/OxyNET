<?php

use Controller\Auth;
use Server\Connection;
use Table\PostTable;

if(Auth::$session['auth']) {
    Auth::check();
    exit();
}

$titre_header = $title = "Supprimer l'article n° {$params['id']}";

$pdo = Connection::getPDO();
$table = new PostTable($pdo);
$table->delete($params['id']);
header('Location: ' . $router->url('admin_post') . '?delete=1');
