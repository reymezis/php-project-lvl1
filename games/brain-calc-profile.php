<?php

namespace BrainGames\GameCalc;

use function BrainGames\engine\engine;
use function BrainGames\engine\generatorNumbers;
use function BrainGames\engine\sayHi;
use function BrainGames\engine\symbolsGenerator;
use function BrainGames\engine\welcome;

function RunGame()
{
    $GameRules = "What is the result of the expression?";
    welcome($GameRules);
    $userName = sayHi();
    $newArray = generatorNumbers(6);
    $randomSymbols = symbolsGenerator();

    function taskGenerator($array, $symbols)
    {
        foreach ($array as $str) {
            $result[] = "{$str}";
        }
        $j = 0;
        for ($i = 0; $i < count($array); $i += 2) {
            $taskArray[] = $array[$i] . $symbols[$j] . $array[$i + 1];
            $j++;
        }
        return $taskArray;
    }
    function answerGenerator($arr)
    {
        for ($i = 0; $i < count($arr); $i++) {
            $answerArray[] = eval("return $arr[$i];");
        }
        foreach ($answerArray as $string) {
            $result[] = "{$string}";
        }
        return $result;
    }
    $tasks = taskGenerator($newArray, $randomSymbols);
    $correctAnswer = answerGenerator($tasks);
    engine($correctAnswer, $tasks, $userName);
}
