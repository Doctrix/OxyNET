<?php
use App\Auth;
use App\Server\ConfigDB;
use App\Table\ArticleTable;

Auth::Verifier();

$titre_header = $title = "Supprimer l'article n° {$params['id']}";
$pdo = ConfigDB::getDatabase();
$table = new ArticleTable($pdo);
$table->supprimer($params['id']);
header('Location: ' . $router->url('admin_articles') . '?supprimer=1');