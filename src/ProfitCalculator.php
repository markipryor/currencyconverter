<?php

namespace App;

final class ProfitCalculator
{

/*Calculates the profit on currency conversion transactions.
The profit is calculated using the PROFIT_MARGIN on the AUD currency in the transaction,
whether it is the currency being converted to or from. 

*/
    private const PROFIT_MARGIN = 0.15;  

    public function calculateProfit() :array {

        $convertedFromProfit = 0;
        $convertedToProfit = 0;
        
        //Open the file in read-only mode
        if (($filehandle = fopen(Config::CONVERSION_FILENAME, 'r')) !== false) {
            
            //Loop through each row of the CSV file
            // columns: 0=amount, 1=fromCurrency, 2=convertedAmount, 3=toCurrency
            while (($row = fgetcsv($filehandle, 100, ',')) !== false) {
                if ($row[1] === 'AUD') {  // if the fromCurrency is AUD then profit is calculated on the amount
                    $convertedFromProfit += $row[0] * self::PROFIT_MARGIN;
                } else {  // if the toCurrency is AUD then profit is calculated on the convertedAmount
                    $convertedToProfit += $row[2] * self::PROFIT_MARGIN;
                } 
            }
            
            //Close the file
            fclose($filehandle);
            
        } else {
             throw new \RuntimeException("Unable to open conversions file for reading");
        }

        return [round($convertedFromProfit,2), round($convertedToProfit,2)];

    }
}