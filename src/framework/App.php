<?php
namespace Framework;

use GuzzleHttp\Psr7\Response;
use Model\Security\ForbiddenException;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class App
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

    public function redirect(array $params = [])
    {
        return $this->router->url($params);
    }

    public function run(ServerRequestInterface $request): ResponseInterface
    {
        $uri = $request->getUri()->getPath();
        $router = $this;
        $match = $router->router->match();
        $view = $match['target'] ?: 'e404';
        $params = $match['params'];
        
        $isAdmin = strpos($view, 'admin/') !== false;
        $isEditor = strpos($view, 'editeur/') !== false;
        $isIDE = strpos($view, 'ide/') !== false;
        $isUser = strpos($view, 'user/') !== false;

        $layout = $isAdmin ? 'admin/layouts/default' : 'layouts/default';

        if (isset($_GET['page']) && $_GET['page'] === '1') {
            $get = $_GET;
            unset($get['page']);
            $query = http_build_query($get);
        }

        if (!empty($query)) {
                $uri = $uri . '?' . $query;
        }

        if (!empty($uri) && $uri[-1] === "/") {
                return (new Response())
                ->withStatus(301)
                ->withHeader('Location', substr($uri, 0, -1));
        }

        if ($uri === '/blog') {
            return new Response(200, [], '<h1>Bienvenue sur le blog</h1>');
        }

        return new Response(404, [], '<h1>Erreur</h1>');

        if ($isUser) {
            $layout = $isUser ? 'user/layouts/default' : 'layouts/default';
        } elseif ($isEditor) {
            $layout = $isEditor ? 'admin/editeur/layouts/default' : 'layouts/default';
        } elseif ($isIDE) {
            $layout = $isIDE ? 'ide/layouts/default' : 'layouts/default';
        } try {
            ob_start();
            require $router->viewPath . DS . $view . '.php';
            $contenu = ob_get_clean();
            require $router->viewPath . DS . $layout. '.php';
        } catch (ForbiddenException $e) {
            return (new Response())
                ->withHeader('Location', $router->url('login') . '?forbidden=1');
        }

        $response = $contenu;
        $response = new Response();
        $response->getBody()->write('bonjour');
        return  $response;
    }
}
