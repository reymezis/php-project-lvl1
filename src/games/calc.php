<?php

namespace BrainGames\games\calc;

use function BrainGames\engine\engine;

use const BrainGames\engine\ROUNDS_COUNT;

const DESCRIPTION = "What is the result of the expression?";
const MIN = 1;
const MAX = 20;
const COUNT_PAIR_NUMBERS = 2 * ROUNDS_COUNT;
const SIGNS = [" + "," - "," * "];

function getRandomNumbers($min, $max, $quantity)
{
    $operands = range($min, $max);
    shuffle($operands);
    return array_slice($operands, 0, $quantity);
}

function getSigns($roundsCount)
{
    $arithmeticSigns = SIGNS;
    shuffle($arithmeticSigns);
    $arithmeticOperatorsSet = [];
    $n = 0;
    while (count($arithmeticOperatorsSet) < $roundsCount) {
        if ($n > 2) {
            $n = 0;
        }
        $arithmeticOperatorsSet[] = $arithmeticSigns[$n];
        $n++;
    }
    return $arithmeticOperatorsSet;
}
function getQuestions($operands, $signs)
{
    foreach ($operands as $str) {
        $result[] = "{$str}";
    }
    $j = 0;
    for ($i = 0; $i < count($operands); $i += 2) {
        $tasks[] = $operands[$i] . $signs[$j] . $operands[$i + 1];
        $j++;
    }
    return $tasks;
}
function getAnswers($operands, $signs)
{
    $result = [];
    $i = 0;
    $j = 0;
    while ($i < count($operands)) {
        switch ($signs[$j]) {
            case " + ":
                $result[] = $operands[$i] + $operands[$i + 1];
                break;
            case " - ":
                $result[] = $operands[$i] - $operands[$i + 1];
                break;
            case " * ":
                $result[] = $operands[$i] * $operands[$i + 1];
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
    $randomSigns = getSigns(ROUNDS_COUNT);
    $tasks = getQuestions($randomNumbers, $randomSigns);
    $correctAnswers = getAnswers($randomNumbers, $randomSigns);
    engine($correctAnswers, $tasks, DESCRIPTION);
}
