<?php

namespace BrainGames\games\prime;

use function BrainGames\engine\engine;

use const BrainGames\engine\ROUNDS_COUNT;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MIN = 2;
const MAX = 20;

function getQuestions($min, $max, $roundsCount)
{
    for ($i = 0; $i < $roundsCount; $i++) {
        $questions[] = rand($min, $max);
    }
    return $questions;
}

function isPrime($value)
{
    if ($value < 2) {
        return false;
    }
    for ($i = 2; $i <= $value / 2; $i++) {
        if ($value % $i == 0) {
            return false;
        }
    }
    return true;
}

function getAnswers($questions)
{
    foreach ($questions as $question) {
        $answers[] = isPrime($question) ? "yes" : "no";
    }
    return $answers;
}
function runGameIsPrime()
{
    $questions = getQuestions(MIN, MAX, ROUNDS_COUNT);
    $answers = getAnswers($questions);
    engine($answers, $questions, DESCRIPTION);
}
