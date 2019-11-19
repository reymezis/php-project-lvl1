<?php

namespace BrainGames\games\prime;

use function BrainGames\engine\engine;

use const BrainGames\engine\ROUNDS_COUNT;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MIN = 2;
const MAX = 20;

function getQuestions($min, $max, $roundsCount)
{
    $questions = range($min, $max);
    shuffle($questions);
    return array_slice($questions, 0, $roundsCount);
}

function isPrime($num)
{
    if ($num < 2) {
        return false;
    }
    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

function getAnswers($tasks)
{
    foreach ($tasks as $question) {
        $answers[] = isPrime($question) ? "yes" : "no";
    }
    return $answers;
}
function runGameIsPrime()
{
    $tasks = getQuestions(MIN, MAX, ROUNDS_COUNT);
    $correctAnswers = getAnswers($tasks);
    engine($correctAnswers, $tasks, DESCRIPTION);
}
