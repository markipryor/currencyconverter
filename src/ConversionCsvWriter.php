<?php

namespace App;

final class ConversionCsvWriter {

    public function writeToCsv(array $conversionData) :void {

        //writes the conversion details to CSV file The file name and location is stored in Config.php

        //The data written to the CSV file is amount , fromCurrency, convertedAmount, toCurrency 

        //Open the file in append mode
        $fileHandle = fopen(Config::CONVERSION_FILENAME , 'a');

        if ($fileHandle === false) {
           throw new \RuntimeException("Unable to open conversions file for writing");
        }

        //Write the data to the file. Only writing one row at a time so no need to loop
        fputcsv($fileHandle, $conversionData);
        
        //Close the file handle
        fclose($fileHandle);

    }

}