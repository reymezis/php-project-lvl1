<?php

namespace BrainGames\GameGCD;

use function BrainGames\engine\engine;
use function BrainGames\engine\generatorNumbers;
use function BrainGames\engine\sayHi;
use function BrainGames\engine\welcome;

function findGCD()
{
    $GameRules = "Find the greatest common divisor of given numbers.";
    welcome($GameRules);
    $userName = sayHi();
    $newArray = generatorNumbers(6);

    function answerGenerator($array)
    {
        foreach ($array as $str) {
            $result[] = "{$str}";
        }
        for ($i = 0; $i < count($array); $i += 2) {
            $gcd = gmp_gcd("{$result[$i]}", "{$result[$i + 1]}");
            $answerArray[] = gmp_strval($gcd);
        }
        return $answerArray;
    }

    function taskGenerator($array)
    {
        for ($i = 0; $i < count($array); $i += 2) {
            $taskArray[] = "{$array[$i]} {$array[$i+1]}";
        }
        return $taskArray;
    }
    $tasks = taskGenerator($newArray);
    $correctAnswer = answerGenerator($newArray);
    engine($correctAnswer, $tasks, $userName);
}
