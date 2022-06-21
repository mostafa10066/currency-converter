<?php
declare(strict_types=1);

require_once __DIR__.'/../vendor/autoload.php';

use Mostafa\CurrencyConverter\CurrencyConverter;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$currency = new CurrencyConverter("EUR","EUR",1);
echo $currency->convert();