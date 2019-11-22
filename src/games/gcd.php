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
        $pairs[] = explode(" ", $question);
    }
    $values = array_reduce($pairs, 'array_merge', array());
    for ($i = 0; $i < count($values); $i += 2) {
        $gcd = findGCD($values[$i], $values[$i + 1]);
        $answers[] = "$gcd";
    }
    return $answers;
}
function getTasks($min, $max, $roundsCount)
{
    for ($i = 0; $i < $roundsCount * 2; $i++) {
        $values[] = rand($min, $max);
    }
    for ($j = 0; $j < $roundsCount * 2; $j += 2) {
        $tasks[] = "{$values[$j]} {$values[$j + 1]}";
    }
    return $tasks;
}
function runGameGCD()
{
    $tasks = getTasks(MIN, MAX, ROUNDS_COUNT);
    $correctAnswers = getAnswers($tasks);
    engine($correctAnswers, $tasks, DESCRIPTION);
}
