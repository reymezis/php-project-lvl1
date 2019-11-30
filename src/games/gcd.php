<?php

namespace BrainGames\games\gcd;

use function BrainGames\engine\engine;

use const BrainGames\engine\ROUNDS_COUNT;

const DESCRIPTION = "Find the greatest common divisor of given numbers.";
const MIN = 1;
const MAX = 50;

function findGCD($a, $b)
{
    if ($b === 0) {
        return abs($a);
    }
    return findGCD($b, $a % $b);
}
function getAnswers($questions)
{
    foreach ($questions as $question) {
        $values[] = explode(" ", $question);
    }
    $elements = array_reduce($values, 'array_merge', array());
    for ($i = 0; $i < count($elements); $i += 2) {
        $gcd = findGCD($elements[$i], $elements[$i + 1]);
        $answers[] = (string) $gcd;
    }
    return $answers;
}
function getQuestions($min, $max, $roundsCount)
{
    for ($i = 0; $i < $roundsCount; $i += 1) {
        $a = rand($min, $max);
        $b = rand($min, $max);
        $questions[] = "{$a} {$b}";
    }
    return $questions;
}
function runGameGCD()
{
    $questions = getQuestions(MIN, MAX, ROUNDS_COUNT);
    $answers = getAnswers($questions);
    engine($answers, $questions, DESCRIPTION);
}
