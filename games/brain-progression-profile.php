<?php

namespace BrainGames\GameProgression;

use function BrainGames\engine\engine;
use function BrainGames\engine\welcome;
use function BrainGames\engine\sayHi;
use function BrainGames\ProgressionFunctions\getHiddenIndices;
use function BrainGames\ProgressionFunctions\getInitialConditions;
use function BrainGames\ProgressionFunctions\getProgressionsAnswer;
use function BrainGames\ProgressionFunctions\getProgressionsTask;
use function BrainGames\ProgressionFunctions\getPureProgressions;

function runGameProgression()
{
    $GameRules = "What number is missing in the progression?";
    welcome($GameRules);
    $userName = sayHi();
    $initialConditions = getInitialConditions();
    $initialArray = getPureProgressions($initialConditions);
    $hideIndeces = getHiddenIndices();
    $tasks = getProgressionsTask($initialArray, $hideIndeces);
    $correctAnswer = getProgressionsAnswer($initialArray, $hideIndeces);
    engine($correctAnswer, $tasks, $userName);
}
