<?php

require_once __DIR__ . '/../src/currencyConverter.php';

$fromCurrency = strtoupper($argv[2]);
$toCurrency = strtoupper($argv[3]);
$amount = (float) ($argv[4] ?? 0);

$converter = new currencyConverter();
$converter->convert($fromCurrency,$toCurrency,$amount);