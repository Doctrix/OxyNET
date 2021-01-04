<?php

use Model\Auth;
use Model\Server\ConfigDB;
use Model\Table\CategorieTable;

if(Auth::$session['auth']) {
    Auth::Verifier();
    exit();
}

$pdo = ConfigDB::getDatabase();
$table = new CategorieTable($pdo);
$table->supprimer($params['id']);
header('Location: ' . $router->url('admin_categories') . '?supprimer=1');
$titre_header = $titre_navBar = "Supprimer la categorie n° {$params['id']}";