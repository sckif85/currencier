<?php

namespace App\Http\Model;

class RegistryCurrency
{
    private string $currency;

    private float $rate;

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): RegistryCurrency
    {
        $this->currency = $currency;

        return $this;
    }

    public function getRate(): float
    {
        return $this->rate;
    }

    public function setRate(float $rate): RegistryCurrency
    {
        $this->rate = $rate;

        return $this;
    }
}