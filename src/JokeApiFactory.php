<?php

namespace Pawelwier\ChuckNorrisJokes;

use GuzzleHttp\Client;

class JokeApiFactory
{
    const API_ENDPOINT = 'http://api.icndb.com/jokes/random';

    protected $client;

    public function __construct(Client $client = null)
    {
        $this->client = $client ?: new Client();
    }

    public function getRandomJokeApi()
    {
        $response = $this->client->get(self::API_ENDPOINT);

        $joke = json_decode($response->getBody()->getContents());

        return $joke->value->joke;
    }
}