<?php

namespace App\Http\Model\Ecb;

use JMS\Serializer\Annotation as Serializer;

class CubeContainer
{
    /**
     * @Serializer\XmlAttribute()
     * @Serializer\Type("datetime")
     * @Serializer\SerializedName("time")
     */
    private \DateTime $time;

    /**
     * @var Cube[]
     * @Serializer\Type("array<App\Http\Model\Ecb\Cube>")
     * @Serializer\XmlList(inline = true, entry = "Cube")
     */
    private array $cubes;

    public function getTime(): \DateTime
    {
        return $this->time;
    }

    public function setTime(\DateTime $time): CubeContainer
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @return Cube[]
     */
    public function getCubes(): array
    {
        return $this->cubes;
    }

    /**
     * @param Cube[] $cubes
     */
    public function setCubes(array $cubes): CubeContainer
    {
        $this->cubes = $cubes;

        return $this;
    }
}