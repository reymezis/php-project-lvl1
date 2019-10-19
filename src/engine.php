<?php

namespace  BrainGames\engine;

use function cli\line;
use function cli\prompt;

function engine($correct, $exercises, $description)
{
    line("Welcome to the Brain Games!");
    line("{$description}\n");
    $userName = prompt('May I have your name?');
    line("Hello, %s!\n", $userName);
    $attempt = 3;
    for ($j = 0; $j < $attempt; $j++) {
        line("Question: {$exercises[$j]}");
        $userAnswer = prompt("Your answer");
        $correctAnswer = $correct[$j];
        if ($correctAnswer === $userAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $userName);
            return;
        }
    }
    return line("Congratulations, %s!\n", $userName);
}
