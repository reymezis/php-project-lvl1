<?php

namespace BrainGames\GameGCD;

use function BrainGames\engine\engine;
use function BrainGames\SupportFunctions\getRandomNumbers;

function findGCD()
{
    $description = "Find the greatest common divisor of given numbers.";
    $randomNumbers = getRandomNumbers(1, 20, 6);
    function answerGenerator($numbers)
    {
        foreach ($numbers as $str) {
            $result[] = "{$str}";
        }
        for ($i = 0; $i < count($numbers); $i += 2) {
            $gcd = gmp_gcd("{$result[$i]}", "{$result[$i + 1]}");
            $answers[] = gmp_strval($gcd);
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
    $tasks = taskGenerator($randomNumbers);
    $correctAnswers = answerGenerator($randomNumbers);
    engine($correctAnswers, $tasks, $description);
}
