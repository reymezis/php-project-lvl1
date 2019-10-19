<?php

namespace BrainGames\src\games;

use function BrainGames\engine\engine;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function getRandomNumbers($min, $max, $quantity)
{
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

function isEven($number)
{
    $correctAnswer = "";
    if ($number % 2 === 0) {
        $correctAnswer = "yes";
    } else {
        $correctAnswer = "no";
    }
    return $correctAnswer;
}

function runGameEven()
{
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
    engine($answers, $tasks, DESCRIPTION);
}
