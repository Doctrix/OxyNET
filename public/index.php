<?php
require dirname(__DIR__) .'/core/constants.php';
require VENDOR . DS .'autoload.php';

$app = new \Framework\App(VIEWS);

$response = $app
    ->obtenir('/', 'post/index', 'home')
    ->obtenir('/blog/categorie/[*:slug]-[i:id]', 'categorie/show', 'categorie')
    ->obtenir('/blog/[*:slug]-[i:id]', 'post/show', 'article')
    ->match('/login', 'auth/login', 'login')
    ->match('/register', 'auth/register', 'register')
    ->match('/logout', 'auth/logout', 'logout')
    ->match('/msg', 'messagerie/index', 'message')
    // ADMIN
    ->obtenir('/admin', 'admin/dashboard', 'dashboard')
    ->match('/editeur', 'admin/editeur/index', 'editeur')
    ->match('/ide', 'admin/ide/index', 'ide')
    ->match('/media', 'admin/media/index', 'media')
    // Gestion des articles
    ->obtenir('/admin/post', 'admin/post/index', 'admin_post')
    ->match('/admin/post/[i:id]', 'admin/post/modifier', 'admin_post_edit')
    ->post('/admin/post/[i:id]/supprimer', 'admin/post/supprimer', 'admin_post_supprimer')
    ->match('/admin/post/nouveau', 'admin/post/nouveau', 'admin_post_nouveau')
    // Gestion des categories
    ->obtenir('/admin/categorie', 'admin/categorie/index', 'admin_categorie')
    ->match('/admin/categorie/[i:id]', 'admin/categorie/modifier', 'admin_categorie_edit')
    ->post('/admin/categorie/[i:id]/supprimer', 'admin/categorie/supprimer', 'admin_categorie_supprimer')
    ->match('/admin/categorie/nouveau', 'admin/categorie/nouveau', 'admin_categorie_nouveau')
    // USER user
    ->obtenir('/user', 'user/membre', 'user')
    ->obtenir('/profil', 'user/profil', 'profil')
    ->obtenir('/profil/dashboard', 'user/index', 'user_dashboard')
    ->match('/voir_profil', 'user/voir_profil', 'user_profil')
    ->obtenir('/live', 'user/live', 'live')
    ->run(\GuzzleHttp\Psr7\ServerRequest::fromGlobals());
\Http\Response\send($response);
