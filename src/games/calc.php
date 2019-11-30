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
    $arithmeticOperators = [];
    $n = 0;
    while (count($arithmeticOperators) < $roundsCount) {
        if ($n > 2) {
            $n = 0;
        }
        $arithmeticOperators[] = $arithmeticSigns[$n];
        $n++;
    }
    return $arithmeticOperators;
}
function getQuestions($operands, $signs)
{
    foreach ($operands as $index => $values) {
        [$firstOperand, $secondOperand] = $values;
        $questions[] = "{$firstOperand} {$signs[$index]} {$secondOperand}";
    }
    return $questions;
}
function getAnswers($operands, $signs)
{
    $result = [];
    foreach ($operands as $index => $values) {
        [$firstOperand, $secondOperand] = $values;
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
