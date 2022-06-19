<?php


use Mostafa\CurrencyConverter\CurrencyConverter;
use PHPUnit\Framework\TestCase;

final class CurrencyConverterTest extends TestCase
{
    public function testCurrencyConverter(): void
    {
        $currency = new CurrencyConverter("USD","EUR",12.5,"api");
        $result = $currency->convert();

        $this->assertIsFloat($result);
    }
}