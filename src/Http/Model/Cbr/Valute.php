<?php

namespace App\Http\Model\Cbr;

use JMS\Serializer\Annotation as Serializer;

class Valute
{
    /**
     * @Serializer\XmlAttribute()
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ID")
     */
    private string $id;

    /**
     * @Serializer\XmlElement()
     * @Serializer\Type("string")
     * @Serializer\SerializedName("NumCode")
     */
    private string $numCode;

    /**
     * @Serializer\XmlElement()
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CharCode")
     */
    private string $charCode;

    /**
     * @Serializer\XmlElement()
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Nominal")
     */
    private int $nominal;

    /**
     * @Serializer\XmlElement()
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Name")
     */
    private string $name;

    /**
     * @Serializer\XmlElement()
     * @Serializer\Type("float")
     * @Serializer\SerializedName("Value")
     */
    private float $value;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Valute
    {
        $this->id = $id;

        return $this;
    }

    public function getNumCode(): string
    {
        return $this->numCode;
    }

    public function setNumCode(string $numCode): Valute
    {
        $this->numCode = $numCode;

        return $this;
    }

    public function getCharCode(): string
    {
        return $this->charCode;
    }

    public function setCharCode(string $charCode): Valute
    {
        $this->charCode = $charCode;

        return $this;
    }

    public function getNominal(): int
    {
        return $this->nominal;
    }

    public function setNominal(int $nominal): Valute
    {
        $this->nominal = $nominal;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Valute
    {
        $this->name = $name;

        return $this;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function setValue(float $value): Valute
    {
        $this->value = $value;

        return $this;
    }
}