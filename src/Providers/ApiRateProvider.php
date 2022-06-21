<?php


namespace Mostafa\CurrencyConverter\Providers;


use Mostafa\CurrencyConverter\Classes\Curl;
use Mostafa\CurrencyConverter\Exceptions\InvalidDataException;
use Mostafa\CurrencyConverter\Exceptions\UnauthorizedDataException;
use Mostafa\CurrencyConverter\Interfaces\RateProviderInterface;


class ApiRateProvider extends Curl implements RateProviderInterface
{
    private string $currencyFrom;
    private string $currencyTo;

    public function __construct(string $currencyFrom, string $currencyTo)
    {
        $this->currencyFrom = $currencyFrom;
        $this->currencyTo = $currencyTo;
    }

    public function getRate(): float
    {
        $url = "https://api.apilayer.com/exchangerates_data/latest?" . "symbols" . "=" . $this->currencyTo . "&base=" . $this->currencyFrom;
        $header = array('apikey:' . $_ENV['API_KEY']);
        $http_result = $this->getCurl($url, $header);
        try {
            $this->validateOutput($http_result["response_code"]);
        } catch (InvalidDataException | UnauthorizedDataException $exception) {
            echo "warning: " . $exception->getMessage();
            exit;
        }
        $currencyTo = $this->currencyTo;
        return $http_result["response"]->rates->$currencyTo;
    }

    public function validateOutput($response_code)
    {
        if ($response_code == 400) {
            throw new InvalidDataException(" Invalid data error. you can check standard currency code here : https://en.wikipedia.org/wiki/ISO_4217 ");
        }
        if ($response_code == 401) {
            throw new UnauthorizedDataException(" 401 Unauthorized Error,probably your api key is invalid ");
        }
    }

}