<?php

namespace App\Http;

use App\Http\Model\Cbr\ValCurs;
use App\Http\Model\RegistryCurrency;
use GuzzleHttp\Exception\GuzzleException;

class CbrCurrencyRegistryApiClient extends AbstractCurrencyRegistryApiClient
{
    /**
     * @return RegistryCurrency[]
     * @throws GuzzleException
     */
    public function getRegistryCurrencies(): array
    {
        /** @var ValCurs $valCurs */
        $valCurs = $this->serializer->deserialize($this->getCurrencyRegistryContent(), ValCurs::class, 'xml');

        $result = [];
        foreach ($valCurs->getValutes() as $valute) {
            $result[] = (new RegistryCurrency())
                ->setRate($valute->getValue())
                ->setCurrency($valute->getCharCode());
        }

        return $result;
    }
}