<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

// For testing, run the command "./vendor/bin/phpunit --testdox tests" for a prettier display of results 

class UsersRoutesTest extends TestCase
{
    protected $client;
    protected $mockHandler;

    protected function setUp(): void
    {
        $this->mockHandler = new MockHandler();
        $handlerStack = HandlerStack::create($this->mockHandler);
        $this->client = new Client(['handler' => $handlerStack]);
    }

    public function testGetUsersRoute()
    {
        $this->mockHandler->append(new Response(200, [], 'Mocked response'));
        $response = $this->client->get('/users');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('Mocked response', (string) $response->getBody());
    }

    public function testGetAllUsersRoute()
    {
        $this->mockHandler->append(new Response(200, [], 'Mocked response for getting all users'));
        $response = $this->client->get('/users');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('Mocked response for getting all users', (string) $response->getBody());
    }

    public function testGetIncomeByUserIdRoute()
    {
        $this->mockHandler->append(new Response(200, [], 'Mocked response for getting income by user ID'));
        $response = $this->client->get('/users/1/income'); 
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('Mocked response for getting income by user ID', (string) $response->getBody());
    }

}




