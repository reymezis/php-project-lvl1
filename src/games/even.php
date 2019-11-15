<?php

namespace BrainGames\src\games;

use function BrainGames\engine\engine;

use const BrainGames\engine\ROUNDS_COUNT;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';
const MIN = 1;
const MAX = 100;

function getQuestions($min, $max, $roundsCount)
{
    $questions = range($min, $max);
    shuffle($questions);
    return array_slice($questions, 0, $roundsCount);
}

function isEven($number)
{
    return $number % 2 === 0;
}

function checkQuestion($question)
{
    $result = isEven($question) ? "yes" : "no";
    return $result;
}

function runGameEven()
{
    $tasks = getQuestions(MIN, MAX, ROUNDS_COUNT);
    function getAnswers($tasks)
    {
        $answers = [];
        foreach ($tasks as $question) {
            $answers [] = checkQuestion($question);
        }
        return $answers;
    }
    $answers = getAnswers($tasks);
    engine($answers, $tasks, DESCRIPTION);
}
