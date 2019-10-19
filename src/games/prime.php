<?php

namespace BrainGames\BrainPrime;

use function BrainGames\engine\engine;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function getRandomNumbers($min, $max, $quantity)
{
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

function isPrime($num)
{
    if ($num < 2) {
        return 'no';
    }
    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i == 0) {
            return 'no';
        }
    }
    return "yes";
}

function getAnswers($numbers)
{
    foreach ($numbers as $num) {
        $answers[] = isPrime($num);
    }
    return $answers;
}
function runGameIsPrime()
{
    $tasks = getRandomNumbers(2, 20, 3);
    $correctAnswers = getAnswers($tasks);
    engine($correctAnswers, $tasks, DESCRIPTION);
}
