<?php

namespace BrainGames\GameProgression;

use function BrainGames\engine\engine;
use function BrainGames\ProgressionFunctions\getHiddenIndices;
use function BrainGames\ProgressionFunctions\getInitialConditions;
use function BrainGames\ProgressionFunctions\getProgressionsAnswer;
use function BrainGames\ProgressionFunctions\getProgressionsTask;
use function BrainGames\ProgressionFunctions\getPureProgressions;

function runGameProgression()
{
    $description = "What number is missing in the progression?";
    $initialConditions = getInitialConditions();
    $progressions = getPureProgressions($initialConditions);
    $hiddenIndices = getHiddenIndices();
    $tasks = getProgressionsTask($progressions, $hiddenIndices);
    $correctAnswers = getProgressionsAnswer($progressions, $hiddenIndices);
    engine($correctAnswers, $tasks, $description);
}
