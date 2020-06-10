<?php
require dirname(__DIR__) .'/core/constants.php';
require dirname(__DIR__) . DS .'vendor/autoload.php';

/* require LIB.DS.'debug.php'; */

if(isset($_GET['page']) && $_GET['page'] === '1') {
    $uri = explode('?', $_SERVER['REQUEST_URI'])[0];
    $get = $_GET;
    unset($get['page']);
    $query = http_build_query($get);
    if(!empty($query)){
        $uri = $uri . '?' . $query;
    }
    http_response_code(301);
    header('Location: ' . $uri);
    exit();
}
$router = new App\Router(dirname(__DIR__) . DS . 'views');
$router
    ->obtenir('/','article/index','home')
    ->obtenir('/blog/categorie/[*:slug]-[i:id]','categorie/show','categorie')
    ->obtenir('/blog/[*:slug]-[i:id]','article/show','article')
    ->match('/login','auth/login','login')
    ->post('/logout','auth/logout','logout')
    // ADMIN
    ->obtenir('/admin','admin/dashboard','dashboard')
    // Gestion des articles
    ->obtenir('/admin/articles','admin/article/index','admin_articles')
    ->match('/admin/article/[i:id]','admin/article/modifier','admin_article')
    ->post('/admin/article/[i:id]/supprimer','admin/article/supprimer','admin_article_supprimer')
    ->match('/admin/article/nouveau','admin/article/nouveau','admin_article_nouveau')
    // Gestion des categories
    ->obtenir('/admin/categories','admin/categorie/index','admin_categories')
    ->match('/admin/categorie/[i:id]','admin/categorie/modifier','admin_categorie')
    ->post('/admin/categorie/[i:id]/supprimer','admin/categorie/supprimer','admin_categorie_supprimer')
    ->match('/admin/categorie/nouveau','admin/categorie/nouveau','admin_categorie_nouveau')
    // USER user
    ->obtenir('/user','user/index','user')
    ->obtenir('/user/dashboard','user/dashboard','user_dashboard')
    ->obtenir('/user/article','user/article/index','user_articles')
    ->match('/user/article/[i:id]','user/article/modifier','user_article')
    ->post('/user/article/[i:id]/supprimer','user/article/supprimer','user_article_supprimer')
    ->match('/user/article/nouveau','user/article/nouveau','user_article_nouveau')
    ->lancer();