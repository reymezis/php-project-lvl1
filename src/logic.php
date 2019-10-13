<?php

namespace BrainGames\logic;

use function BrainGames\Cli\run;
use function cli\line;
use function cli\prompt;

function isPrime($number)
{
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i  == 0) {
            return "no";
        }
        if (($i == $number) || ($i > sqrt($number))) {
            return "yes";
        }
    }
    return "yes";
}

function isEven($number)
{
    $correctAnswer = "";
    if ($number % 2 === 0) {
        $correctAnswer = "yes";
    } else {
        $correctAnswer = "no";
    }
    return $correctAnswer;
}

function game()
{
    line("Welcome to the Brain Games!");
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".\n");
    $userName = prompt('May I have your name?');
    run($userName);
    $array = [];
    for ($i = 0; $i < 3; $i++) {
        $array[] = rand(1, 100);
    }
    for ($j = 0; $j < count($array); $j++) {
        line('Question: %d', $array[$j]);
        $userAnswer = prompt("Your answer");
        $even = isEven($array[$j]);
        if ($even === $userAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $even);
            return line("Let's try again, %s!", $userName);
        }
    }
    return line("Congratulations, %s!\n", $userName);
}
