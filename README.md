# currency-converter

# Usage

For converting the currencies we just need to instantiate class CurrencyConverter.  \
This class needs four parameters. \
CurrencyFrom *required*. \
CurrencyTo *required*. \
Amount *required*.  \
Rate provider type default is *api* *optional*.

# Example
```php
$currency = new CurrencyConverter("EUR","JPY",1);
echo $currency->convert();
```

# Notice

DbRateProvider.php added as an example to show, we can have some providers to give us Rate. Those providers can send the request to other Api.
After creating our provider class we just need to add it to ProviderFactory.php which is our maker(factory) Then it can be used by a Rate provider type.


# Test

```php
php vendor/bin/phpunit tests/CurrencyConverterTest.php --colors --filter  testCurrencyConverterMethodReturnsFloatIfUSDANDEUR

php vendor/bin/phpunit tests/CurrencyConverterTest.php --colors --filter testCurrencyConverterMethodReturnsTrueIfEqualCurrency
```

# Licence
Mostafa Mohammad Beigi
