Simple Currency Converter code.

Execute the converter using:

php bin/convert.php convert <fromCurrency> <toCurrency> <amount>

Allowed currencies are AUD, USD, NZD, GBP, EUR

It only converts to or from AUD

Conversion details are written to a CSV file

Profit from the conversion transactions can be displayed using:

php bin/profit.php profit

This reads the transactions from the CSV file and displays the calculated profit.
