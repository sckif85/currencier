<?php

namespace App\Http;

use App\Http\Model\RegistryCurrency;

interface CurrencyRegistryApiClientInterface
{
    /**
     * @return RegistryCurrency[]
     */
    public function getRegistryCurrencies(): array;
}