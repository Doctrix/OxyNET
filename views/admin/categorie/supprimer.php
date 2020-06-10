<?php
use App\{Auth,ConnexionServeur};
use App\Table\CategorieTable;

Auth::Verifier();

$pdo = ConnexionServeur::obtenirPDO();
$table = new CategorieTable($pdo);
$table->supprimer($params['id']);
header('Location: ' . $router->url('admin_categories') . '?supprimer=1');
$titre_header = $titre_navBar = "Supprimer la categorie n° {$params['id']}";