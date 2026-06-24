<?php

namespace App;

final class CurrencyConverter
{

    private const AUD_rates = [
        'AUD' => 1.0,
        'USD' => 1.5,
        'NZD' => 0.9,
        'GBP' => 1.7,
        'EUR' => 1.5,
    ];

    public function convert(string $fromCurrency, string $toCurrency, float $amount) :float {

        if (!isset(self::AUD_rates[$fromCurrency])) {
            throw new \InvalidArgumentException("Unsupported currency: {$fromCurrency}");
        }

        if (!isset(self::AUD_rates[$toCurrency])) {
            throw new \InvalidArgumentException("Unsupported currency: {$toCurrency}");
        }
        
        if ($amount <= 0) {
            throw new \InvalidArgumentException("Amount must be greater than zero");
        }

        if (($fromCurrency !== 'AUD') && ($toCurrency !== 'AUD')) {
            throw new \InvalidArgumentException("You must select to or from AUD");
        }

        if ($fromCurrency == 'AUD') {
            $convertedAmount = $amount * self::AUD_rates[$toCurrency];
        } else {
            $convertedAmount = $amount / self::AUD_rates[$fromCurrency];
        }
        
        return round($convertedAmount, 2);
    }

}


