<?php

namespace Pawelwier\ChuckNorrisJokes\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

use PHPUnit\Framework\TestCase;
use Pawelwier\ChuckNorrisJokes\JokeApiFactory;

class JokeApiFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_joke_api()
    {
        $mock = new MockHandler([
            new Response(200, [], '{ "type": "success", "value": { "id": 169, "joke": "Chuck Norris won super bowls VII and VIII singlehandedly before unexpectedly retiring to pursue a career in ass-kicking.", "categories": [] } }'),
        ]);
        
        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $jokes = new JokeApiFactory($client);

        $joke = $jokes->getRandomJokeApi();

        $this->assertSame('Chuck Norris won super bowls VII and VIII singlehandedly before unexpectedly retiring to pursue a career in ass-kicking.', $joke);
    }
}