<?php


namespace Mostafa\CurrencyConverter;


use Mostafa\CurrencyConverter\Classes\ProvidersFactory;

class CurrencyConverter
{
    private $currencyFrom;
    private $currencyTo;
    private $amount;
    private $type;

    public function __construct(String $currencyFrom,String $currencyTo,float $amount,String $type = null){
        $this->currencyFrom = $currencyFrom;
        $this->currencyTo = $currencyTo;
        $this->amount = $amount;
        $this->type = $type;
    }

    public function convert(){
        $provider = ProvidersFactory::make($this->currencyFrom,$this->currencyTo,$this->type);
        $rate = $provider->getRate();
        return $rate*$this->amount;

    }


}