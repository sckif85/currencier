<?php

namespace App\Service;

use App\Entity\Currency;
use Exception;

class Converter
{
    /**
     * @throws Exception
     */
    public function convert(float $value, Currency $currencyFrom, Currency $currencyTo): float
    {
        return ($value / $currencyFrom->getRate()) * $currencyTo->getRate();
    }
}