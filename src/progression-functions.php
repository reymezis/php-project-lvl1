<?php

namespace BrainGames\ProgressionFunctions;

function getInitialConditions()
{
    $amountOfConditions = 3;
    for ($i = 0; $i < $amountOfConditions; $i++) {
        $firstNumber = rand(1, 100);
        $commonDifference = range(1, 3);
        $amountOfProgressionElements = 10;
        switch ($commonDifference[$i]) {
            case 1:
                $lastNumber = $firstNumber + $amountOfProgressionElements;
                break;
            case 2:
                $lastNumber = $firstNumber + $amountOfProgressionElements * 2;
                break;
            case 3:
                $lastNumber = $firstNumber + $amountOfProgressionElements * 3;
                break;
        }
        $initialConditions[$i][0] = $firstNumber;
        $initialConditions[$i][1] = $lastNumber;
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
