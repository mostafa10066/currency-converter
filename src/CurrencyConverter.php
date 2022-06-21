<?php


namespace Mostafa\CurrencyConverter;


use Mostafa\CurrencyConverter\Classes\ProvidersFactory;
use Mostafa\CurrencyConverter\Classes\Validation;

class CurrencyConverter
{
    private string $currencyFrom;
    private string $currencyTo;
    private float $amount;
    private ?string $type;

    public function __construct(string $currencyFrom,string $currencyTo,float $amount,string $type = null){
        $this->currencyFrom = $currencyFrom;
        $this->currencyTo = $currencyTo;
        $this->amount = $amount;
        $this->type = $type;

    }

    public function convert():float{
        $this->validateInput(new Validation());
        $provider = ProvidersFactory::make($this->currencyFrom,$this->currencyTo,$this->type);
        $rate = $provider->getRate();
        return $rate * $this->amount;
    }

    public function validateInput(Validation $validation){
        $validationInput = new $validation();
        try {
            $validationInput->validate($this->currencyFrom);
            $validationInput->validate($this->currencyTo);

        } catch (Exceptions\InvalidDataException $e) {
            echo "warning: Invalid data error "."on file ".$e->getFile(). " line ".$e->getLine()." ".$e->getMessage();
            exit;
        }
    }


}