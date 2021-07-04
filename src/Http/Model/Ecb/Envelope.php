<?php

namespace App\Http\Model\Ecb;

use JMS\Serializer\Annotation as Serializer;

class Envelope
{
    /**
     * @Serializer\Type("App\Http\Model\Ecb\CubeWrapper")
     * @Serializer\SerializedName ("Cube")
     */
    private ?CubeWrapper $cubeWrapper = null;

    public function getCubeWrapper(): ?CubeWrapper
    {
        return $this->cubeWrapper;
    }

    public function setCubeWrapper(?CubeWrapper $cubeWrapper): Envelope
    {
        $this->cubeWrapper = $cubeWrapper;

        return $this;
    }

    /**
     * @return Cube[]
     */
    public function getLastDatesCubes(): array
    {
        if (is_null($this->cubeWrapper)) {
            return [];
        }

        $cubeContainers = $this->cubeWrapper->getCubeContainers();

        usort($cubeContainers, [$this, "sortContainersByDate"]);
        $cubeContainer = array_pop($cubeContainers);

        return $cubeContainer ? $cubeContainer->getCubes() : [];
    }

    private function sortContainersByDate(CubeContainer $cubeContainerA, CubeContainer $cubeContainerB): bool
    {
        if ($cubeContainerA->getTime() === $cubeContainerB->getTime()) {
            return 0;
        }

        return ($cubeContainerA->getTime() < $cubeContainerB->getTime()) ? -1 : 1;
    }
}