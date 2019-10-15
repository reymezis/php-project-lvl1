<?php

namespace BrainGames\src\games;

use function BrainGames\engine\engine;
use function BrainGames\SupportFunctions\getRandomNumbers;
use function BrainGames\SupportFunctions\isEven;

function runGameEven()
{
    $description = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
    $tasks = getRandomNumbers(1, 100, 3);
    function getAnswers($tasks)
    {
        $answers = [];
        foreach ($tasks as $number) {
            $answers [] = isEven($number);
        }
        return $answers;
    }
    $answers = getAnswers($tasks);
    engine($answers, $tasks, $description);
}
