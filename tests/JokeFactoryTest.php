<?php

namespace Pawelwier\ChuckNorrisJokes\Tests;

use PHPUnit\Framework\TestCase;
use Pawelwier\ChuckNorrisJokes\JokeFactory;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_predefined_joke()
    {
        $jokes = new JokeFactory([
            'a test joke',
        ]);

        $joke = $jokes->getRandomJoke();

        $this->assertSame('a test joke', $joke);
    }

    /** @test */
    public function it_returns_a_random_joke()
    {
        $testJokes = [
            'Chuck Norris doesn’t read books. He stares them down until he gets the information he wants.',
            'Time waits for no man. Unless that man is Chuck Norris.',
            'If you spell Chuck Norris in Scrabble, you win. Forever.',
            'Chuck Norris breathes air … five times a day.'
        ];

        $jokes = new JokeFactory();

        $joke = $jokes->getRandomJoke();

        $this->assertContains($joke, $testJokes);
    }

    /** @test */
    public function it_returns_number_of_jokes()
    {
        $testJokes = [
            'Chuck Norris doesn’t read books. He stares them down until he gets the information he wants.',
            'Time waits for no man. Unless that man is Chuck Norris.',
            'If you spell Chuck Norris in Scrabble, you win. Forever.',
            'Chuck Norris breathes air … five times a day.'
        ];

        $jokes = new JokeFactory();
        $jokeCounter = $jokes->getJokesNumber();

        $this->assertSame(4, $jokeCounter);
    }

    /** @test */
    public function it_returns_joke_at_index()
    {
        $testJokes = [
            'Chuck Norris doesn’t read books. He stares them down until he gets the information he wants.',
            'Time waits for no man. Unless that man is Chuck Norris.',
            'If you spell Chuck Norris in Scrabble, you win. Forever.',
            'Chuck Norris breathes air … five times a day.'
        ];

        $jokes = new JokeFactory();

        $this->assertSame($testJokes[1], $jokes->getJokeAtIndex(1));
    }

    /** @test */
    public function it_returns_no_joke_at_index()
    {
        $testJokes = [
            'Chuck Norris doesn’t read books. He stares them down until he gets the information he wants.',
            'Time waits for no man. Unless that man is Chuck Norris.',
            'If you spell Chuck Norris in Scrabble, you win. Forever.',
            'Chuck Norris breathes air … five times a day.'
        ];

        $jokes = new JokeFactory();

        $this->assertSame($jokes->getJokeAtIndex(8), "No joke at index 8");
    }
}