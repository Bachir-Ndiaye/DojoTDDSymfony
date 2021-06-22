<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{
    public function testSomething(): void
    {
        $paramOne = "Toto";
        $paramTwo = "Tata";
        $parameters = array("param1" => $paramOne,
                            "param2" => $paramTwo);

        $client = static::createClient();
        $crawler = $client->request('GET', '/', $parameters);

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Hello World');
    }
    
}

