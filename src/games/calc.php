<?php

namespace BrainGames\GameCalc;

use function BrainGames\engine\engine;

const DESCRIPTION = "What is the result of the expression?";

function getRandomNumbers($min, $max, $quantity)
{
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

function symbolsGenerator()
{
    $symbols = [" + "," - "," * "];
    shuffle($symbols);
    return $symbols;
}
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
function answerGenerator($randomNumbers, $randomSymbols)
{
    $result = [];
    $i = 0;
    $j = 0;
    while ($i < count($randomNumbers)) {
        switch ($randomSymbols[$j]) {
            case " + ":
                $result[] = $randomNumbers[$i] + $randomNumbers[$i + 1];
                break;
            case " - ":
                $result[] = $randomNumbers[$i] - $randomNumbers[$i + 1];
                break;
            case " * ":
                $result[] = $randomNumbers[$i] * $randomNumbers[$i + 1];
                break;
        }
        $i += 2;
        $j++;
    }
    foreach ($result as $answer) {
        $answers[] = "$answer";
    }
    return $answers;
}

function runGameCalc()
{
    $randomNumbers = getRandomNumbers(1, 20, 6);
    $randomSymbols = symbolsGenerator();
    $tasks = taskGenerator($randomNumbers, $randomSymbols);
    $correctAnswers = answerGenerator($randomNumbers, $randomSymbols);
    engine($correctAnswers, $tasks, DESCRIPTION);
}
