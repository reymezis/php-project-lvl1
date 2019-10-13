<?php

namespace BrainGames\BrainPrime;

use function BrainGames\engine\engine;
use function BrainGames\engine\getRandomArray;
use function BrainGames\engine\sayHi;
use function BrainGames\engine\welcome;
use function BrainGames\logic\isPrime;

function runGameIsPrime()
{
    $GameRules = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
    welcome($GameRules);
    $userName = sayHi();
    $taskArray = getRandomArray(2, 20, 3);
    function getAnswers($numbers)
    {
        $arraysAnswer = [];
        foreach ($numbers as $No) {
            $arraysAnswer[] = isPrime($No);
        }
        return $arraysAnswer;
    }
    $correctAnswers = getAnswers($taskArray);
    engine($correctAnswers, $taskArray, $userName);
}
