<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\CurrencyConverter;

if (($argc < 5) || (strtolower($argv[1]) !== 'convert')) {
    echo "The command you have entered is invalid. Enter: php bin/convert.php convert <fromCurrency> <toCurrency> <amount>\n";
    exit(1);
}


$fromCurrency = strtoupper($argv[2]);
$toCurrency = strtoupper($argv[3]);
$amount = (float) $argv[4];

$converter = new CurrencyConverter();

try {
    echo $converter->convert($fromCurrency,$toCurrency,$amount) . "\n";
} catch (\InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
