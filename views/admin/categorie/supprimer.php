<?php
use App\Auth;
use App\Server\ConfigDB;
use App\Table\CategorieTable;

Auth::Verifier();

$pdo = ConfigDB::getDatabase();
$table = new CategorieTable($pdo);
$table->supprimer($params['id']);
header('Location: ' . $router->url('admin_categories') . '?supprimer=1');
$titre_header = $titre_navBar = "Supprimer la categorie n° {$params['id']}";