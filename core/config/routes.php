<?php
$uri = $_SERVER['REQUEST_URI'];

if (isset($_GET['page']) && $_GET['page'] === '1') {
    $get = $_GET;
    unset($get['page']);
    $query = http_build_query($get);
    if (!empty($query)) {
        $uri = $uri . '?' . $query;
    }
}

$router = new Framework\App(VIEWS);
$router
    ->get('/', 'post/index', 'home')
    ->get('/blog', 'post/index', 'blog')
    ->get('/blog/categorie/[*:slug]-[i:id]', 'categorie/show', 'categorie')
    ->get('/blog/[*:slug]-[i:id]', 'post/show', 'article')
    ->match('/login', 'auth/login', 'login')
    ->match('/register', 'auth/register', 'register')
    ->match('/logout', 'auth/logout', 'logout')
    ->match('/msg', 'messagerie/index', 'message')
    // ADMIN
    ->get('/admin', 'admin/dashboard', 'dashboard')
    ->match('/editeur', 'admin/editeur/index', 'editeur')
    ->match('/ide', 'admin/ide/index', 'ide')
    ->match('/media', 'admin/media/index', 'media')
    // Gestion des articles
    ->get('/admin/post', 'admin/post/index', 'admin_post')
    ->match('/admin/post/[i:id]', 'admin/post/modifier', 'admin_post_edit')
    ->post('/admin/post/[i:id]/supprimer', 'admin/post/supprimer', 'admin_post_supprimer')
    ->match('/admin/post/nouveau', 'admin/post/nouveau', 'admin_post_nouveau')
    // Gestion des categories
    ->get('/admin/categorie', 'admin/categorie/index', 'admin_categorie')
    ->match('/admin/categorie/[i:id]', 'admin/categorie/modifier', 'admin_categorie_edit')
    ->post('/admin/categorie/[i:id]/supprimer', 'admin/categorie/supprimer', 'admin_categorie_supprimer')
    ->match('/admin/categorie/nouveau', 'admin/categorie/nouveau', 'admin_categorie_nouveau')
    // USER user
    ->get('/user', 'user/membre', 'user')
    ->get('/profil', 'user/profil', 'profil')
    ->get('/profil/dashboard', 'user/index', 'user_dashboard')
    ->match('/voir_profil', 'user/voir_profil', 'user_profil')
    ->get('/live', 'user/live', 'live')
    ->run();
