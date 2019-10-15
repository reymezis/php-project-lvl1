<?php

namespace BrainGames\BrainPrime;

use function BrainGames\engine\engine;
use function BrainGames\SupportFunctions\getRandomNumbers;
use function BrainGames\SupportFunctions\isPrime;

function runGameIsPrime()
{
    $description = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
    $tasks = getRandomNumbers(2, 20, 3);
    function getAnswers($numbers)
    {
        foreach ($numbers as $No) {
            $answers[] = isPrime($No);
        }
        return $answers;
    }
    $correctAnswers = getAnswers($tasks);
    engine($correctAnswers, $tasks, $description);
}
