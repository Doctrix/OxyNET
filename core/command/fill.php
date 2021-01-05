<?php
use App\ConnexionServeur;
use Server\ConfigDB;

require dirname(__DIR__) .'/constants.php';
require dirname(dirname(__DIR__)) . DS .'vendor/autoload.php';

$pdo = ConfigDB::getDatabase();

$faker = Faker\Factory::create('fr_FR');

$pdo->exec('SET FOREIGN_KEY_CHECKS = 0');
$pdo->exec('TRUNCATE TABLE post_categorie');
$pdo->exec('TRUNCATE TABLE post');
$pdo->exec('TRUNCATE TABLE categorie');
$pdo->exec('TRUNCATE TABLE user');
$pdo->exec('SET FOREIGN_KEY_CHECKS = 1');

$posts = [];
$categories = [];
$lien = 'https://serveur.oxygames.fr';

for ($i = 0; $i < 50; $i++){
    $pdo->exec("INSERT INTO post SET title='{$faker->sentence()}',slug='{$faker->slug}',date_de_creation='{$faker->date} {$faker->time}',content='{$faker->paragraphs(rand(3,15), true)}', extrait='ceci est un extrait', lien='$lien'");
    $posts[] = $pdo->LastInsertId();
}

for ($i = 0; $i < 10; $i++){
    $pdo->exec("INSERT INTO categorie SET name='{$faker->sentence(3)}',slug='{$faker->slug}'");
    $categories[] = $pdo->LastInsertId();
}

foreach($posts as $post){
    $randomCategories = $faker->randomElements($categories, rand(0, count($categories)));
    foreach($randomCategories as $categorie){
        $pdo->exec("INSERT INTO post_categorie SET post_id=$post, categorie_id=$categorie");
    }
}

$username = 'admin';
$email = 'admin@oxygames.fr';
$password = password_hash('admin', PASSWORD_BCRYPT);
$pdo->exec("INSERT INTO user SET username='$username', email='$email', password='$password'");