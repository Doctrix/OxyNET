<?php
use App\ConnexionServeur;
use App\Server\ConfigDB;

require dirname(__DIR__) .'/constants.php';
require dirname(dirname(__DIR__)) . DS .'vendor/autoload.php';

$pdo = ConfigDB::getDatabase();

$faker = Faker\Factory::create('fr_FR');

$pdo->exec('SET FOREIGN_KEY_CHECKS = 0');
$pdo->exec('TRUNCATE TABLE article_categorie');
$pdo->exec('TRUNCATE TABLE article');
$pdo->exec('TRUNCATE TABLE categorie');
$pdo->exec('TRUNCATE TABLE utilisateur');
$pdo->exec('SET FOREIGN_KEY_CHECKS = 1');

$articles = [];
$categories = [];
$lien = 'https://serveur.oxygames.fr';

for ($i = 0; $i < 50; $i++){
    $pdo->exec("INSERT INTO article SET titre='{$faker->sentence()}',slug='{$faker->slug}',date_de_creation='{$faker->date} {$faker->time}',contenu='{$faker->paragraphs(rand(3,15), true)}', extrait='ceci est un extrait', lien='$lien'");
    $articles[] = $pdo->LastInsertId();
}

for ($i = 0; $i < 10; $i++){
    $pdo->exec("INSERT INTO categorie SET nom='{$faker->sentence(3)}',slug='{$faker->slug}'");
    $categories[] = $pdo->LastInsertId();
}

foreach($articles as $article){
    $randomCategories = $faker->randomElements($categories, rand(0, count($categories)));
    foreach($randomCategories as $categorie){
        $pdo->exec("INSERT INTO article_categorie SET article_id=$article, categorie_id=$categorie");
    }
}
$username = 'admin';
$email = 'admin@oxygames.fr';
$password = password_hash('admin', PASSWORD_BCRYPT);
$pdo->exec("INSERT INTO utilisateur SET username='$username', email='$email', password='$password'");