<?php

namespace BrainGames\games\calc;

use function BrainGames\engine\engine;

use const BrainGames\engine\ROUNDS_COUNT;

const DESCRIPTION = "What is the result of the expression?";
const MIN = 1;
const MAX = 20;
const SIGNS = ["+","-","*"];

function getOperands($min, $max, $roundsCount)
{
    for ($j = 0; $j < $roundsCount; $j++) {
        $firstOperand = rand($min, $max);
        $secondOperand = rand($min, $max);
        $values = [$firstOperand, $secondOperand];
        $operands[] = $values;
    }
    return $operands;
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
    foreach ($operands as $index => $values) {
        $i = 0;
        $firstOperand = $values[$i];
        $secondOperand = $values[$i + 1];
        $questions[] = "{$firstOperand} {$signs[$index]} {$secondOperand}";
    }
    return $questions;
}
function getAnswers($operands, $signs)
{
    $result = [];
    foreach ($operands as $index => $values) {
        $i = 0;
        $firstOperand = $values[$i];
        $secondOperand = $values[$i + 1];
        switch ($signs[$index]) {
            case "+":
                $result[] = $firstOperand + $secondOperand;
                break;
            case "-":
                $result[] = $firstOperand - $secondOperand;
                break;
            case "*":
                $result[] = $firstOperand * $secondOperand;
                break;
        }
    }
    foreach ($result as $answer) {
        $answers[] = "{$answer}";
    }
    return $answers;
}

function runGameCalc()
{
    $operands = getOperands(MIN, MAX, ROUNDS_COUNT);
    $signs = getSigns(ROUNDS_COUNT);
    $questions = getQuestions($operands, $signs);
    $answers = getAnswers($operands, $signs);
    engine($answers, $questions, DESCRIPTION);
}
