<?php
require_once __DIR__.'/../vendor/autoload.php';

use Mostafa\CurrencyConverter\CurrencyConverter;

$currency = new CurrencyConverter("USD","EUR",12.5);
echo $currency->convert();