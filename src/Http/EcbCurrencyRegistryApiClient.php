<?php

namespace App\Http;

use App\Http\Model\Ecb\Envelope;
use App\Http\Model\RegistryCurrency;
use GuzzleHttp\Exception\GuzzleException;

class EcbCurrencyRegistryApiClient extends AbstractCurrencyRegistryApiClient
{
    /**
     * @return RegistryCurrency[]
     * @throws GuzzleException
     */
    public function getRegistryCurrencies(): array
    {
        /** @var Envelope $envelop */
        $envelop = $this->serializer->deserialize($this->getCurrencyRegistryContent(), Envelope::class, 'xml');

        $result = [];
        foreach ($envelop->getLastDatesCubes() as $cube) {
            $result[] = (new RegistryCurrency())
                ->setRate($cube->getRate())
                ->setCurrency($cube->getCurrency());
        }

        return $result;
    }
}