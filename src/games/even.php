<?php

namespace BrainGames\games\even;

use function BrainGames\engine\engine;

use const BrainGames\engine\ROUNDS_COUNT;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';
const MIN = 1;
const MAX = 100;

function getQuestions($min, $max, $roundsCount)
{
    for ($i = 0; $i < $roundsCount; $i++) {
        $questions[] = rand($min, $max);
    }
    return $questions;
}

function isEven($value)
{
    return $value % 2 === 0;
}

function getAnswers($tasks)
{
    $answers = [];
    foreach ($tasks as $question) {
        $answers [] = isEven($question) ? "yes" : "no";
    }
    return $answers;
}

function runGameEven()
{
    $questions = getQuestions(MIN, MAX, ROUNDS_COUNT);
    $answers = getAnswers($questions);
    engine($answers, $questions, DESCRIPTION);
}
