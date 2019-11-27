<?php

namespace BrainGames\games\progression;

use function BrainGames\engine\engine;

use const BrainGames\engine\ROUNDS_COUNT;

const DESCRIPTION = "What number is missing in the progression?";

const PROGRESSION_LENGTH = 10;

function generateProgression($firstElement, $step, $progressionLength)
{
    $progression = [];
    for ($n = 0; $n < $progressionLength; $n++) {
        $progression[] = $firstElement + $n * $step;
    }
    return $progression;
}

function getPureProgressions($roundsCount)
{
    $progressions = [];
    for ($j = 0; $j < $roundsCount; $j++) {
        $firstElement = rand(1, 100);
        $step = rand(1, 4);
        $progressions[$j] = generateProgression($firstElement, $step, PROGRESSION_LENGTH);
    }
    shuffle($progressions);
    return $progressions;
}

function getHiddenElementIndices($roundsCount)
{
    $indices = range(0, PROGRESSION_LENGTH - 1);
    shuffle($indices);
    for ($i = 0; $i < $roundsCount; $i++) {
        $hiddenElementIndices[] = $indices[$i];
    }
    return $hiddenElementIndices;
}

function getQuestions($progressions, $hiddenElementIndices)
{
    $questions = [];
    for ($i = 0; $i < count($progressions); $i++) {
        $progressions[$i][$hiddenElementIndices[$i]] = "..";
        $question = implode(" ", $progressions[$i]);
        $questions[$i] = $question;
    }
    return $questions;
}

function getAnswers($progressions, $hiddenElementIndices)
{
    $answers = [];
    for ($i = 0; $i < count($progressions); $i++) {
        $answer = $progressions[$i][$hiddenElementIndices[$i]];
        $answers[] = "{$answer}";
    }
    return $answers;
}

function runGameProgression()
{
    $progressions = getPureProgressions(ROUNDS_COUNT);
    $hiddenElementIndices = getHiddenElementIndices(ROUNDS_COUNT);
    $questions = getQuestions($progressions, $hiddenElementIndices);
    $answers = getAnswers($progressions, $hiddenElementIndices);
    engine($answers, $questions, DESCRIPTION);
}
