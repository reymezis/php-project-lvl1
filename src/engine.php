<?php

namespace  BrainGames\engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function engine($answers, $questions, $description)
{
    line("Welcome to the Brain Games!");
    line("{$description}\n");
    $userName = prompt('May I have your name?');
    line("Hello, %s!\n", $userName);
    for ($j = 0; $j < ROUNDS_COUNT; $j++) {
        line("Question: {$questions[$j]}");
        $userAnswer = prompt("Your answer");
        $correctAnswer = $answers[$j];
        if ($correctAnswer === $userAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $userName);
            return;
        }
    }
    line("Congratulations, %s!\n", $userName);
}
