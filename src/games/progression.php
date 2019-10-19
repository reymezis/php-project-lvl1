<?php

namespace BrainGames\GameProgression;

use function BrainGames\engine\engine;

const DESCRIPTION = "What number is missing in the progression?";

function getInitialConditions()
{
    $conditions = 3;
    for ($i = 0; $i < $conditions; $i++) {
        $firstElement = rand(1, 100);
        $commonDifference = range(1, 3);
        $progressionLength = 10;
        switch ($commonDifference[$i]) {
            case 1:
                $lastElement = $firstElement + $progressionLength;
                break;
            case 2:
                $lastElement = $firstElement + $progressionLength * 2;
                break;
            case 3:
                $lastElement = $firstElement + $progressionLength * 3;
                break;
        }
        $initialConditions[$i][0] = $firstElement;
        $initialConditions[$i][1] = $lastElement;
        $initialConditions[$i][2] = $commonDifference[$i];
    }
    return $initialConditions;
}

function getPureProgressions($initCondtns)
{
    $progressions = [[],[],[]];
    $amountOfProgressions = 3;
    for ($j = 0; $j < $amountOfProgressions; $j++) {
        for ($i = $initCondtns[$j][0]; $i < $initCondtns[$j][1]; $i += $initCondtns[$j][2]) {
            $progressions[$j][] = "{$i}";
        }
    }
    shuffle($progressions);
    return $progressions;
}

function getHiddenIndices()
{
    $numbers = range(1, 8);
    shuffle($numbers);
    $amountOfHiddenIndices = 3;
    for ($i = 0; $i < $amountOfHiddenIndices; $i++) {
        $hiddenIndices[] = $numbers[$i];
    }
    return $hiddenIndices;
}

function getProgressionsTask($progressions, $hideIndices)
{
    $replaceArray = $progressions;
    $tasks = [];
    for ($i = 0; $i < 3; $i++) {
        $replaceArray[$i][$hideIndices[$i]] = "..";
        $string = implode(" ", $replaceArray[$i]);
        $tasks[$i] = $string;
    }
    return $tasks;
}

function getProgressionsAnswer($progressions, $hiddenIndices)
{
    $keyAnswers = [];
    for ($i = 0; $i < 3; $i++) {
        $replaceValue = $progressions[$i][$hiddenIndices[$i]];
        $keyAnswers[] = "{$replaceValue}";
    }
    return $keyAnswers;
}


function runGameProgression()
{
    $initialConditions = getInitialConditions();
    $progressions = getPureProgressions($initialConditions);
    $hiddenIndices = getHiddenIndices();
    $tasks = getProgressionsTask($progressions, $hiddenIndices);
    $correctAnswers = getProgressionsAnswer($progressions, $hiddenIndices);
    engine($correctAnswers, $tasks, DESCRIPTION);
}
