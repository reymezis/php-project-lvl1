<?php

namespace BrainGames\GameProgression;

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

function getHiddenIndices($roundsCount)
{
    $indices = range(1, 8);
    shuffle($indices);
    for ($i = 0; $i < $roundsCount; $i++) {
        $hiddenIndices[] = $indices[$i];
    }
    return $hiddenIndices;
}

function getQuestions($progressions, $hiddenIndices)
{
    $replaceArray = $progressions;
    $tasks = [];
    for ($i = 0; $i < count($progressions); $i++) {
        $replaceArray[$i][$hiddenIndices[$i]] = "..";
        $question = implode(" ", $replaceArray[$i]);
        $tasks[$i] = $question;
    }
    return $tasks;
}

function getAnswers($progressions, $hiddenIndices)
{
    $keyAnswers = [];
    for ($i = 0; $i < count($progressions); $i++) {
        $replaceValue = $progressions[$i][$hiddenIndices[$i]];
        $keyAnswers[] = "{$replaceValue}";
    }
    return $keyAnswers;
}

function runGameProgression()
{
    $progressions = getPureProgressions(ROUNDS_COUNT);
    $hiddenIndices = getHiddenIndices(ROUNDS_COUNT);
    $tasks = getQuestions($progressions, $hiddenIndices);
    $correctAnswers = getAnswers($progressions, $hiddenIndices);
    engine($correctAnswers, $tasks, DESCRIPTION);
}
