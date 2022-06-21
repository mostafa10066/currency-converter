<?php
use Mostafa\CurrencyConverter\CurrencyConverter;
use PHPUnit\Framework\TestCase;
use \Mostafa\CurrencyConverter\Exceptions\InvalidDataException;

final class CurrencyConverterTest extends TestCase
{
    public function testCurrencyConverterMethodReturnsFloatIfUSDANDEUR(): void
    {
        $currency = new CurrencyConverter("USD", "EUR", 12.5);
        $result = $currency->convert();
        $this->assertIsFloat($result);
    }

    public function testCurrencyConverterMethodReturnsExceptionIfInvalidData(): void
    {
        $currency = new CurrencyConverter(" ", "EUR", 12.5);
        $currency->convert();
        $this->assertInstanceOf(InvalidDataException::class, new Exception);
    }
}