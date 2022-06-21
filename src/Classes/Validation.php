<?php


namespace Mostafa\CurrencyConverter\Classes;
use Mostafa\CurrencyConverter\Exceptions\InvalidDataException;

class Validation
{
    public function validate($input){
        if(strlen(trim($input))<1 || strlen(trim($input))>3){
            throw new InvalidDataException ("you can check standard currency code here : https://en.wikipedia.org/wiki/ISO_4217 ");

        }
    }

}