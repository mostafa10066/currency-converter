<?php


namespace Mostafa\CurrencyConverter\Providers;


use Mostafa\CurrencyConverter\Interfaces\RateProviderInterface;

//just as an example I defined this class. to show that we can define some provider to give us rate.
class DbRateProvider implements RateProviderInterface
{
    private string $currencyFrom;
    private string $currencyTo;

    public function __construct(string $currencyFrom,string $currencyTo){
        $this->currencyFrom = $currencyFrom;
        $this->currencyTo = $currencyTo;

    }

    public function getRate():float
    {

        return 20;

    }

}