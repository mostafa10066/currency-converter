<?php


namespace Mostafa\CurrencyConverter\Classes;


use Mostafa\CurrencyConverter\Providers\ApiRateProvider;
use Mostafa\CurrencyConverter\Providers\DbRateProvider;

final class ProvidersFactory
{
    public static function make(String $currencyFrom,String $currencyTo,String $type=null){
        if($type === "db"){
            return new DbRateProvider($currencyFrom,$currencyTo);
        }
        return new ApiRateProvider($currencyFrom,$currencyTo);
    }

}