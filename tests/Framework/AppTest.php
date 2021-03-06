<?php
namespace Tests\Framework;
use Controller\Router;
use GuzzleHttp\Psr7\ServerRequest;
use PHPUnit\Framework\TestCase;

class AppTest extends TestCase {
    public function testRedirectTrailingSlash() {
        $app = new Router(VIEWS);
        $request = new ServerRequest('GET','/azerty/');
        $response = $app->run($request);
        $this->assertContains('/azerty', $response->getHeader('Location'));
        $this->assertEquals(301, $response->getStatusCode());
    }

    public function testBlog() {
        $app = new Router(VIEWS);
        $request = new ServerRequest('GET', '/blog');
        $response = $app->run($request);
        $this->assertContains('<h1>Bienvenue sur le blog</h1>', $this->response->getBody());
        $this->assertEquals(200,$response->getStatusCode());
    }

    public function testError404() {
        $app = new Router(VIEWS);
        $request = new ServerRequest('GET', '/aze');
        $response = $app->run($request);
        $this->assertContains('<h1>Erreur 404</h1>', $this->response->getBody());
        $this->assertEquals(404,$response->getStatusCode());
    }
}