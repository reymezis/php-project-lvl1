<?php

namespace BrainGames\ProgressionFunctions;

function getInitialConditions()
{
    for ($i = 0; $i < 3; $i++) {
        $a = rand(1, 100);
        $step = range(1, 3);
        $amountArrayElements = 10;
        switch ($step[$i]) {
            case 1:
                $n = $a + $amountArrayElements;
                break;
            case 2:
                $n = $a + $amountArrayElements * 2;
                break;
            case 3:
                $n = $a + $amountArrayElements * 3;
                break;
        }
        $initialConditions[$i][0] = $a;
        $initialConditions[$i][1] = $n;
        $initialConditions[$i][2] = $step[$i];
    }
    return $initialConditions;
}

function getPureProgressions($initArr)
{
    $progressionArray = [[],[],[]];
    for ($j = 0; $j < 3; $j++) {
        for ($i = $initArr[$j][0]; $i < $initArr[$j][1]; $i += $initArr[$j][2]) {
            $progressionArray[$j][] = "{$i}";
        }
    }
    shuffle($progressionArray);
    return $progressionArray;
}

function getHiddenIndices()
{
    $numbers = range(1, 8);
    shuffle($numbers);
    for ($i = 0; $i < 3; $i++) {
        $hideIndices[] = $numbers[$i];
    }
    return $hideIndices;
}

function getProgressionsTask($arr, $hideIndices)
{
    $replaceArray = $arr;
    $taskArray = [];
    for ($i = 0; $i < 3; $i++) {
        $replaceArray[$i][$hideIndices[$i]] = "..";
        $string = implode(" ", $replaceArray[$i]);
        $taskArray[$i] = $string;
    }
    return $taskArray;
}

function getProgressionsAnswer($arr, $hideIndices)
{
    $arrayWithKeyAnswers = [];
    for ($i = 0; $i < 3; $i++) {
        $replaceValue = $arr[$i][$hideIndices[$i]];
        $arrayWithKeyAnswers[] = "{$replaceValue}";
    }
    return $arrayWithKeyAnswers;
}
