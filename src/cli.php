<?php

namespace BrainGames\Cli;

use function cli\line;

function run($name)
{
    return line("Hello, %s!", $name);
}
