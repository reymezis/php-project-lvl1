<?php

namespace  BrainGames\engine;

use function cli\line;
use function cli\prompt;


function generatorNumbers($num)
{
    for ($i = 0; $i < $num; $i++) {
        $array[] = rand(1, 20);
    }
    return $array;
}



function engine($correct, $exercises, $description)
{
    line("Welcome to the Brain Games!");
    line("{$description}\n");
    $userName = prompt('May I have your name?');
    line("Hello, %s!\n", $userName);
    $roundsQuantity = 3;
    for ($j = 0; $j < $roundsQuantity; $j++) {
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
