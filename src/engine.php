<?php

namespace  BrainGames\engine;

use function BrainGames\Cli\run;
use function cli\line;
use function cli\prompt;

function welcome($greeting)
{
    line("Welcome to the Brain Games!");
    return line("{$greeting}\n");
}

function sayHi()
{
    $userName = prompt('May I have your name?');
    run($userName);
    return $userName;
}

function generatorNumbers($num)
{
    for ($i = 0; $i < $num; $i++) {
        $array[] = rand(1, 20);
    }
    return $array;
}

function getRandomArray($min, $max, $quantity)
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

function engine($correct, $exercises, $userName)
{
    for ($j = 0; $j < 3; $j++) {
        line("Question: {$exercises[$j]}");
        $userAnswer = prompt("Your answer");
        $correctAnswer = $correct[$j];
        if ($correctAnswer === $userAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            return line("Let's try again, %s!", $userName);
        }
    }
    return line("Congratulations, %s!\n", $userName);
}
