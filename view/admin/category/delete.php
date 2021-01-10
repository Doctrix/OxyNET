<?php

use Controller\Auth;
use Server\Connection;
use Table\CategoryTable;

Auth::check();

$pdo = Connection::getPDO();
$table = new CategoryTable($pdo);
$table->delete($params['id']);
header('Location: ' . $router->url('admin_category') . '?delete=1');
//$titre_header = $titre_navBar = "Supprimer la categorie n° {$params['id']}";