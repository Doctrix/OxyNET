<?php
use App\{Auth,ConnexionServeur};
use App\Table\ArticleTable;

Auth::Verifier();

$titre_header = $titre_navBar = "Supprimer l'article n° {$params['id']}";
$pdo = ConnexionServeur::obtenirPDO();
$table = new ArticleTable($pdo);
//$table->supprimer($params['id']);
header('Location: ' . $router->url('admin_articles') . '?supprimer=1');