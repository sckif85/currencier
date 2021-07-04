<?php

namespace App\Http\Model\Cbr;

use JMS\Serializer\Annotation as Serializer;

class ValCurs
{
    /**
     * @Serializer\XmlAttribute()
     * @Serializer\Type("datetime")
     * @Serializer\SerializedName("Date")
     */
    private \DateTime $date;

    /**
     * @Serializer\XmlAttribute()
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     */
    private string $name;

    /**
     * @var Valute[]
     * @Serializer\Type("array<App\Http\Model\Cbr\Valute>")
     * @Serializer\XmlList(inline = true, entry = "Valute")
     */
    private array $valutes = [];

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): ValCurs
    {
        $this->date = $date;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ValCurs
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Valute[]
     */
    public function getValutes(): array
    {
        return $this->valutes;
    }

    /**
     * @param Valute[] $valutes
     */
    public function setValutes(array $valutes): ValCurs
    {
        $this->valutes = $valutes;

        return $this;
    }
}