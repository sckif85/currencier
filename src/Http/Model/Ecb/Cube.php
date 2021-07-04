<?php

namespace App\Http\Model\Ecb;

use JMS\Serializer\Annotation as Serializer;

class Cube
{
    /**
     * @Serializer\XmlAttribute()
     * @Serializer\Type("string")
     * @Serializer\SerializedName("currency")
     */
    private string $currency;

    /**
     * @Serializer\XmlAttribute()
     * @Serializer\Type("float")
     * @Serializer\SerializedName("rate")
     */
    private float $rate;

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): Cube
    {
        $this->currency = $currency;

        return $this;
    }

    public function getRate(): float
    {
        return $this->rate;
    }

    public function setRate(float $rate): Cube
    {
        $this->rate = $rate;

        return $this;
    }
}