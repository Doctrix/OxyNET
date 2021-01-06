<?php

if (isset($_GET['page']) && $_GET['page'] === '1') {
    $uri = explode('?', $_SERVER['REQUEST_URI'])[0];
    $get = $_GET;
    unset($get['page']);
    $query = http_build_query($get);
    if (!empty($query)) {
        $uri = $uri . '?' . $query;
    }
    http_response_code(301);
    header('Location: ' . $uri);
    exit();
}

$router = new Framework\App(VIEWS);
$router
    ->get('/', 'post/index', 'home')
    ->get('/blog', 'blog/index', 'blog')
    ->get('/blog/category/[*:slug]-[i:id]', 'category/show', 'category')
    ->get('/blog/[*:slug]-[i:id]', 'post/show', 'post')
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
    ->match('/admin/post/[i:id]', 'admin/post/edit', 'admin_post_edit')
    ->post('/admin/post/[i:id]/delete', 'admin/post/delete', 'admin_post_delete')
    ->match('/admin/post/new', 'admin/post/new', 'admin_post_new')
    // Gestion des categories
    ->get('/admin/category', 'admin/category/index', 'admin_category')
    ->match('/admin/category/[i:id]', 'admin/category/edit', 'admin_category_edit')
    ->post('/admin/category/[i:id]/delete', 'admin/category/delete', 'admin_category_delete')
    ->match('/admin/category/new', 'admin/category/new', 'admin_category_new')
    // USER user
    ->get('/user', 'user/membre', 'user')
    ->get('/profil', 'user/profil', 'profil')
    ->get('/profil/dashboard', 'user/index', 'user_dashboard')
    ->match('/voir_profil', 'user/voir_profil', 'user_profil')
    ->get('/live', 'user/live', 'live')
    ->run();
