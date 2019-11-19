<?php

namespace BrainGames\games\calc;

use function BrainGames\engine\engine;

use const BrainGames\engine\ROUNDS_COUNT;

const DESCRIPTION = "What is the result of the expression?";
const MIN = 1;
const MAX = 20;
const COUNT_PAIR_NUMBERS = 2 * ROUNDS_COUNT;

function getRandomNumbers($min, $max, $quantity)
{
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

function symbolsGenerator($roundsCount)
{
    $symbols = [" + "," - "," * "];
    shuffle($symbols);
    $arithmeticOperatorsSet = [];
    $n = 0;
    while (count($arithmeticOperatorsSet) < $roundsCount) {
        if ($n > 2) {
            $n = 0;
        }
        $arithmeticOperatorsSet[] = $symbols[$n];
        $n++;
    }
    return $arithmeticOperatorsSet;
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
    $randomNumbers = getRandomNumbers(MIN, MAX, COUNT_PAIR_NUMBERS);
    $randomSymbols = symbolsGenerator(ROUNDS_COUNT);
    $tasks = taskGenerator($randomNumbers, $randomSymbols);
    $correctAnswers = answerGenerator($randomNumbers, $randomSymbols);
    engine($correctAnswers, $tasks, DESCRIPTION);
}
