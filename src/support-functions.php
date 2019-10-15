<?php

namespace BrainGames\SupportFunctions;

function getRandomNumbers($min, $max, $quantity)
{
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}

function isPrime($number)
{
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i  == 0) {
            return "no";
        }
        if (($i == $number) || ($i > sqrt($number))) {
            return "yes";
        }
    }
    return "yes";
}

function isEven($number)
{
    $correctAnswer = "";
    if ($number % 2 === 0) {
        $correctAnswer = "yes";
    } else {
        $correctAnswer = "no";
    }
    return $correctAnswer;
}

function symbolsGenerator()
{
    $symbols = [" + "," - "," * "];
    shuffle($symbols);
    return $symbols;
}
