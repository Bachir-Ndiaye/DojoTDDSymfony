<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{
    /**
     * Test is valid
     *
     * @return void
     */
    public function testValidOccurence(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/difference/toto/tata'); 

        $response = $client->getResponse();
        $content = $response->getContent(); 

        $expectendResponse = 'Occurence trouvée entre les deux paramètres';

        $this->assertResponseIsSuccessful();
        $this->assertEquals($expectendResponse,$content);   
    }

    /**
     * The first parameter is not in the correct format
     *
     * @return void
     */
    public function testNotValidParam1(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/difference/15/tata');

        $response = $client->getResponse();
        $content = $response->getContent();

        $status = 404;

        $expectendResponse = 'Le parametre 1 est non valide';

        $this->assertResponseStatusCodeSame($status);
        $this->assertEquals($expectendResponse, $content);
    }

    /**
     * The second parameter is not in the correct format
     *
     * @return void
     */
    public function testNotValidParam2(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/difference/toto/56');

        $response = $client->getResponse();
        $content = $response->getContent();

        $status = 404;

        $expectendResponse = 'Le parametre 2 est non valide';

        $this->assertResponseStatusCodeSame($status);
        $this->assertEquals($expectendResponse, $content);
    }

    /**
     * None of the parameters are in the correct format
     *
     * @return void
     */
    public function testNotValidParams(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/difference/15/87');

        $response = $client->getResponse();
        $content = $response->getContent();

        $status = 404;

        $expectendResponse = 'Les parametres sont non valide';

        $this->assertResponseStatusCodeSame($status);
        $this->assertEquals($expectendResponse, $content);
    }

    /**
     * No occurence found
     *
     * @return void
     */
    public function testNoOccurence(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/difference/toto/fafa');

        $response = $client->getResponse();
        $content = $response->getContent();

        $expectendResponse = 'Pas doccurence trouvée entre les deux paramètres';

        $this->assertResponseIsSuccessful();
        $this->assertEquals($expectendResponse, $content);
    }
    
}

