<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\ProfitCalculator;

if (($argc < 2) || (strtolower($argv[1]) !== 'profit')) {
    echo "The command you have entered is invalid. Enter: php bin/profit.php profit\n";
    exit(1);
}

$calculator = new ProfitCalculator();

try {
    [$convertedFromProfit,$convertedToProfit] = $calculator->calculateProfit();
    echo 'The profit on transactions so far is ' . ($convertedFromProfit + $convertedToProfit) . "\n";
} catch (\RuntimeException $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}