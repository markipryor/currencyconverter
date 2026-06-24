<?php

final class currencyConverter
{

    private const AUD_rates = [
        'AUD' => '1.0',
        'USD' => '1.5',
        'NZD' => '0.9',
        'GBP' => '1.7',
        'EUR' => '1.5',
    ];

    public function convert($fromCurrency,$toCurrency,$amount) {

        if (!isset(self::AUD_rates[$fromCurrency])) {
        //    throw new \InvalidArgumentException("Unsupported currency: {$fromCurrency}");
            echo 'The from Currency you have entered is not valid';
            die();
        }

        if (!isset(self::AUD_rates[$toCurrency])) {
        //    throw new \InvalidArgumentException("Unsupported currency: {$toCurrency}");
            echo 'The to Currency you have entered is not valid';
            die();
        }
        
        //if $amount nan

        if (($fromCurrency != 'AUD') && ($toCurrency != 'AUD')) {
            echo 'you must select to or from AUD';
        } else {
            if ($fromCurrency == 'AUD') {
                $convertedAmount = $amount * self::AUD_rates[$toCurrency];
            } else {
                $convertedAmount = $amount / self::AUD_rates[$fromCurrency];
            }
        }

        echo round($convertedAmount, 2);
       // return round($convertedAmount, 2);
    }

   

}


