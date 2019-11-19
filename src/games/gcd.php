<?php

namespace BrainGames\games\gcd;

use function BrainGames\engine\engine;

use const BrainGames\engine\ROUNDS_COUNT;

const DESCRIPTION = "Find the greatest common divisor of given numbers.";
const MIN = 1;
const MAX = 50;
const QUESTIONS_COUNT = 2 * ROUNDS_COUNT;

function getQuestions($min, $max, $questionsCount)
{
    $questions = range($min, $max);
    shuffle($questions);
    return array_slice($questions, 0, $questionsCount);
}

function findGCD($a, $b)
{
    if ($b === 0) {
        return abs($a);
    }
    return findGCD($b, $a % $b);
}
function getAnswers($questions)
{
    foreach ($questions as $str) {
        $result[] = "{$str}";
    }
    for ($i = 0; $i < count($questions); $i += 2) {
        $gcd = findGCD("{$result[$i]}", "{$result[$i + 1]}");
        $answers[] = "$gcd";
    }
    return $answers;
}
function getTasks($questions)
{
    for ($i = 0; $i < count($questions); $i += 2) {
        $tasks[] = "{$questions[$i]} {$questions[$i + 1]}";
    }
    return $tasks;
}
function runGameGCD()
{
    $pairsOfNumbers = getQuestions(MIN, MAX, QUESTIONS_COUNT);
    $tasks = getTasks($pairsOfNumbers);
    $correctAnswers = getAnswers($pairsOfNumbers);
    engine($correctAnswers, $tasks, DESCRIPTION);
}
