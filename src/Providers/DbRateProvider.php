<?php


namespace Mostafa\CurrencyConverter\Providers;


use Mostafa\CurrencyConverter\Interfaces\RateProviderInterface;

class DbRateProvider implements RateProviderInterface
{
    private $currencyFrom;
    private $currencyTo;

    public function __construct(String $currencyFrom,String $currencyTo){
        $this->currencyFrom = $currencyFrom;
        $this->currencyTo = $currencyTo;

    }

    public function getRate():float
    {
        return 20;

    }

}