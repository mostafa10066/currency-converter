<?php


namespace Mostafa\CurrencyConverter\Providers;


use Mostafa\CurrencyConverter\Interfaces\RateProviderInterface;


class ApiRateProvider implements RateProviderInterface
{
    private $currencyFrom;
    private $currencyTo;

    public function __construct(String $currencyFrom,String $currencyTo){
        $this->currencyFrom = $currencyFrom;
        $this->currencyTo = $currencyTo;
    }

    public function getRate():float
    {
        $url = "https://api.apilayer.com/exchangerates_data/latest?"."symbols"."=".$this->currencyTo."&base=".$this->currencyFrom;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'apikey:'. $_ENV['API_KEY'],
        ));
        $resp = curl_exec($curl);
        curl_close($curl);
        $result=json_decode($resp);
        $currencyTo = $this->currencyTo;
        return$result->rates->$currencyTo;
    }

}