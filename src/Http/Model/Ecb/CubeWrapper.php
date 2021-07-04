<?php

namespace App\Http\Model\Ecb;

use JMS\Serializer\Annotation as Serializer;

class CubeWrapper
{
    /**
     * @var CubeContainer[]
     * @Serializer\Type("array<App\Http\Model\Ecb\CubeContainer>")
     * @Serializer\XmlList(inline = true, entry = "Cube")
     */
    private array $cubeContainers = [];

    /**
     * @return CubeContainer[]
     */
    public function getCubeContainers(): array
    {
        return $this->cubeContainers;
    }

    /**
     * @param CubeContainer[] $cubeContainers
     */
    public function setCubeContainers(array $cubeContainers): CubeWrapper
    {
        $this->cubeContainers = $cubeContainers;

        return $this;
    }
}