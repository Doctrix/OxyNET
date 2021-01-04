<?php

use Model\Auth;
use Model\Server\ConfigDB;
use Model\Table\ArticleTable;

if(Auth::$session['auth']) {
    Auth::Verifier();
    exit();
}

$titre_header = $title = "Supprimer l'article n° {$params['id']}";

$pdo = ConfigDB::getDatabase();
$table = new ArticleTable($pdo);
$table->supprimer($params['id']);
header('Location: ' . $router->url('admin_articles') . '?supprimer=1');