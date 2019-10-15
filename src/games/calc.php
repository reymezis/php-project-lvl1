<?php

namespace BrainGames\GameCalc;

use function BrainGames\engine\engine;
use function BrainGames\SupportFunctions\symbolsGenerator;
use function BrainGames\SupportFunctions\getRandomNumbers;

function runGameCalc()
{
    $description = "What is the result of the expression?";
    $randomNumbers = getRandomNumbers(1, 20, 6);
    $randomSymbols = symbolsGenerator();

    function taskGenerator($numbers, $symbols)
    {
        foreach ($numbers as $str) {
            $result[] = "{$str}";
        }
        $j = 0;
        for ($i = 0; $i < count($numbers); $i += 2) {
            $tasks[] = $numbers[$i] . $symbols[$j] . $numbers[$i + 1];
            $j++;
        }
        return $tasks;
    }
    function answerGenerator($arr)
    {
        for ($i = 0; $i < count($arr); $i++) {
            $answers[] = eval("return $arr[$i];");
        }
        foreach ($answers as $string) {
            $result[] = "{$string}";
        }
        return $result;
    }
    $tasks = taskGenerator($randomNumbers, $randomSymbols);
    $correctAnswer = answerGenerator($tasks);
    engine($correctAnswer, $tasks, $description);
}
