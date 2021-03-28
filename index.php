<?php

namespace Pawelwier\ChuckNorrisJokes;
use Pawelwier\ChuckNorrisJokes\JokeFactory;

require 'vendor/autoload.php';

$jokes = new JokeFactory();

echo $jokes->getJokeAtIndex(8);
