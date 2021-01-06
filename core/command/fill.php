<?php
use Server\Connection;

require VENDOR . DS . 'autoload.php';

$pdo = Connection::getPDO();

$faker = Faker\Factory::create('fr_FR');

$pdo->exec('SET FOREIGN_KEY_CHECKS = 0');
$pdo->exec('TRUNCATE TABLE post_category');
$pdo->exec('TRUNCATE TABLE post');
$pdo->exec('TRUNCATE TABLE category');
$pdo->exec('TRUNCATE TABLE user');
$pdo->exec('SET FOREIGN_KEY_CHECKS = 1');

$posts = [];
$categories = [];
$lien = 'https://serveur.oxygames.fr';

for ($i = 0; $i < 50; $i++){
    $pdo->exec("INSERT INTO post SET title='{$faker->sentence()}',slug='{$faker->slug}',created_at='{$faker->date} {$faker->time}',content='{$faker->paragraphs(rand(3,15), true)}', excerpt='ceci est un extrait', url='$url'");
    $posts[] = $pdo->LastInsertId();
}

for ($i = 0; $i < 10; $i++){
    $pdo->exec("INSERT INTO category SET name='{$faker->sentence(3)}',slug='{$faker->slug}'");
    $categories[] = $pdo->LastInsertId();
}

foreach($posts as $post){
    $randomCategories = $faker->randomElements($categories, rand(0, count($categories)));
    foreach($randomCategories as $category){
        $pdo->exec("INSERT INTO post_category SET post_id=$post, category_id=$category");
    }
}

$username = 'admin';
$email = 'contact@oxygames.fr';
$password = password_hash('admin', PASSWORD_BCRYPT);
$pdo->exec("INSERT INTO user SET username='$username', email='$email', password='$password'");