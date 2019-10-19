<?php

namespace BrainGames\GameGCD;

use function BrainGames\engine\engine;

const DESCRIPTION = "Find the greatest common divisor of given numbers.";

function getRandomNumbers($min, $max, $quantity)
{
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

function gcd($a, $b)
{
    if ($b === 0) {
        return abs($a);
    }
    return gcd($b, $a % $b);
}
function answerGenerator($numbers)
{
    foreach ($numbers as $str) {
        $result[] = "{$str}";
    }
    for ($i = 0; $i < count($numbers); $i += 2) {
        $gcd = gcd("{$result[$i]}", "{$result[$i + 1]}");
        $answers[] = "$gcd";
    }
    return $answers;
}
function taskGenerator($numbers)
{
    for ($i = 0; $i < count($numbers); $i += 2) {
        $tasks[] = "{$numbers[$i]} {$numbers[$i+1]}";
    }
    return $tasks;
}
function findGCD()
{
    $randomNumbers = getRandomNumbers(1, 50, 6);
    $tasks = taskGenerator($randomNumbers);
    $correctAnswers = answerGenerator($randomNumbers);
    engine($correctAnswers, $tasks, DESCRIPTION);
}
