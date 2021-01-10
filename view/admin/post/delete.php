<?php
use Server\Connection;
use Table\PostTable;
use Controller\Auth;

Auth::check();

$pdo = Connection::getPDO();
$table = new PostTable($pdo);
$table->delete($params['id']);
header('Location: ' . $router->url('admin_post') . '?delete=1');

//$titre_header = $title = "Supprimer l'article n° {$params['id']}";
