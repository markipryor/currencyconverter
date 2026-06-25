<?php

/* This file takes the arguments from the command line execution and converts an amount from or to AUD
    The arguments are:
        1. 'convert' - to trigger the convert function in the CurrencyConverter class
        2. fromCurrency - the currency to convert from (allowed values are AUD, USD, NZD, GBP, EUR)
        3. toCurrency - the currency to convert to (allowed values are AUD, USD, NZD, GBP, EUR)
        4. amount - the amount to be converted 
    The result of the conversion is displayed to the screen 

    The details are then written to CSV file. The file name and location is stored in Config.php

    The data written to the CSV file is amount , fromCurrency, convertedAmount, toCurrency 
*/

require_once __DIR__ . '/../vendor/autoload.php';

use App\CurrencyConverter;

if (($argc < 5) || (strtolower($argv[1]) !== 'convert')) {
    echo "The command you have entered is invalid. Enter: php bin/convert.php convert <fromCurrency> <toCurrency> <amount>\n";
    exit(1);
}

//Take the arguments from the command and assigned them to variables
$fromCurrency = strtoupper($argv[2]);
$toCurrency = strtoupper($argv[3]);
$amount = (float) $argv[4];

$converter = new CurrencyConverter();

try {
    //calculate conversion
    $convertedAmount = $converter->convert($fromCurrency,$toCurrency,$amount);
    echo $amount . ' ' . $fromCurrency . ' converts to ' . $convertedAmount . ' ' . $toCurrency . "\n";
} catch (\InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}

//assign variables to array to pass to csv writer
$conversionData = [ $amount , $fromCurrency, $convertedAmount, $toCurrency ];
      
try {
    //write data to csv
    $converter->writeToCsv($conversionData);
} catch (\RuntimeException $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}

