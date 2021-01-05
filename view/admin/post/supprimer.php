<?php

use App\Auth;
use Server\ConfigDB;
use Table\PostTable;

if(Auth::$session['auth']) {
    Auth::Verifier();
    exit();
}

$titre_header = $title = "Supprimer l'article n° {$params['id']}";

$pdo = ConfigDB::getDatabase();
$table = new PostTable($pdo);
$table->supprimer($params['id']);
header('Location: ' . $router->url('admin_post') . '?supprimer=1');