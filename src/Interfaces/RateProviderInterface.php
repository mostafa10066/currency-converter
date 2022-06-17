<?php


namespace Mostafa\CurrencyConverter\Interfaces;

/**
 * @property string $currencyFrom
 * @property string $currencyTo
 */

interface RateProviderInterface
{
    public function __construct(String $currencyFrom,String $currencyTo);
    public function getRate():float;

}