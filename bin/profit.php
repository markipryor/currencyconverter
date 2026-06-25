<?php

/* This file takes the arguments from the command line execution and calculates the profit from conversion transactions
    The only argument is:
        1. 'profit' - to trigger the profit function in the ProfitCalculator class

    The profit amount in AUD is displayed to the screen 

*/

require_once __DIR__ . '/../vendor/autoload.php';

use App\ProfitCalculator;

if (($argc < 2) || (strtolower($argv[1]) !== 'profit')) {
    echo "The command you have entered is invalid. Enter: php bin/profit.php profit\n";
    exit(1);
}

$calculator = new ProfitCalculator();

try {
    //I have split the converted to and converted from profit. Though it was not necessary for this exercise this is a likely future reporting requirement 
    [$convertedFromProfit,$convertedToProfit] = $calculator->calculateProfit();
    echo 'The profit on transactions so far is ' . ($convertedFromProfit + $convertedToProfit) . "\n";
} catch (\RuntimeException $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}