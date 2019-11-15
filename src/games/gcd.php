<?php

namespace BrainGames\GameGCD;

use function BrainGames\engine\engine;

use const BrainGames\engine\ROUNDS_COUNT;

const DESCRIPTION = "Find the greatest common divisor of given numbers.";
const MIN = 1;
const MAX = 50;
const COUNT_PAIR_NUMBERS = 2 * ROUNDS_COUNT;

function getRandomNumbers($min, $max, $countPairNumbers)
{
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $countPairNumbers);
}

function findGCD($a, $b)
{
    if ($b === 0) {
        return abs($a);
    }
    return findGCD($b, $a % $b);
}
function answersGenerator($numbers)
{
    foreach ($numbers as $str) {
        $result[] = "{$str}";
    }
    for ($i = 0; $i < count($numbers); $i += 2) {
        $gcd = findGCD("{$result[$i]}", "{$result[$i + 1]}");
        $answers[] = "$gcd";
    }
    return $answers;
}
function tasksGenerator($numbers)
{
    for ($i = 0; $i < count($numbers); $i += 2) {
        $tasks[] = "{$numbers[$i]} {$numbers[$i+1]}";
    }
    return $tasks;
}
function runGameGCD()
{
    $pairsOfNumbers = getRandomNumbers(MIN, MAX, COUNT_PAIR_NUMBERS);
    $tasks = tasksGenerator($pairsOfNumbers);
    $correctAnswers = answersGenerator($pairsOfNumbers);
    engine($correctAnswers, $tasks, DESCRIPTION);
}
