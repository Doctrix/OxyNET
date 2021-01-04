<?php
namespace Tests\Framework;

use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
    public function testRedirectTrailingSlash(){
        $app = new App();
        $_SERVER['REQUEST_URI'] = '/azerty/';
        $app->lancer();
        $this->assertContains('Location: /azerty', headers_list());
    }
}