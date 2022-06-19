<?php
require_once __DIR__.'/../vendor/autoload.php';

use Mostafa\CurrencyConverter\CurrencyConverter;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$currency = new CurrencyConverter("USD","EUR",12.5,"api");
echo $currency->convert();