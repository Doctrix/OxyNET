<?php

namespace App;

use App\Security\ForbiddenException;

class Router
{
    /**
     * @var string
     */
    private $viewPath;

    /**
     * @var AltoRouter
     */
    private $router;
    
    public function __construct(string $viewPath)
    {
        $this->viewPath = $viewPath;
        $this->router = new \AltoRouter();
    }
 
    public function obtenir(string $url, string $view, ?string $titre = null): self
    {
        $this->router->map('GET', $url, $view, $titre);

        return $this;
    }

    public function post(string $url, string $view, ?string $titre = null): self
    {
        $this->router->map('POST', $url, $view, $titre);

        return $this;
    }

    public function match(string $url, string $view, ?string $titre = null): self
    {
        $this->router->map('POST|GET', $url, $view, $titre);

        return $this;
    }
 
    public function url(string $titre, array $params = [])
    {
        return $this->router->generate($titre, $params);
    }
 
    public function lancer(): self
    {
        $match = $this->router->match();
        $view = $match['target'] ?: 'e404';
        $params = $match['params'];
        $router = $this;
        $isAdmin = strpos($view, 'admin/') !== false;
        $isEditor = strpos($view, 'editeur/') !== false;
        $isIDE = strpos($view, 'ide/') !== false;
        $isUser = strpos($view, 'user/') !== false;
        $layout = $isAdmin ? 'admin/layouts/default' : 'layouts/default';
        if ($isUser) {
            $layout = $isUser ? 'user/layouts/default' : 'layouts/default';
        } elseif ($isEditor) {
            $layout = $isEditor ? 'editeur/layouts/default' : 'layouts/default';
        } elseif ($isIDE) {
            $layout = $isIDE ? 'ide/layouts/default' : 'layouts/default';
        }
        try {
            ob_start();
            require $this->viewPath . DIRECTORY_SEPARATOR . $view . '.php';
            $contenu = ob_get_clean();
            require $this->viewPath . DIRECTORY_SEPARATOR . $layout. '.php';
        } catch (ForbiddenException $e) {
            header('Location: ' . $this->url('login') . '?forbidden=1');
            exit();
        }
        return $this;
    }
}

/* ROUTER */
