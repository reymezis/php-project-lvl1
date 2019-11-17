<?php

namespace  BrainGames\engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function engine($correct, $exercises, $description)
{
    line("Welcome to the Brain Games!");
    line("{$description}\n");
    $userName = prompt('May I have your name?');
    line("Hello, %s!\n", $userName);
    for ($j = 0; $j < ROUNDS_COUNT; $j++) {
        line("Question: {$exercises[$j]}");
        $userAnswer = prompt("Your answer");
        $correctAnswer = $correct[$j];
        if ($correctAnswer === $userAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $userName);
            break;
        }
        if ($j + 1 === ROUNDS_COUNT) {
            line("Congratulations, %s!\n", $userName);
        }
    }
}
