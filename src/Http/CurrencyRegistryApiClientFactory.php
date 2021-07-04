<?php

namespace App\Http;

use Exception;
use JMS\Serializer\Serializer;

class CurrencyRegistryApiClientFactory
{
    private Serializer $serializer;

    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @throws Exception
     */
    public function __invoke(
        string $currencyRegistryName,
        string $currencyRegistryUrl
    ): CurrencyRegistryApiClientInterface {
        switch ($currencyRegistryName) {
            case 'ECB':
                return new EcbCurrencyRegistryApiClient($currencyRegistryUrl, $this->serializer);
            case 'CBR':
                return new CbrCurrencyRegistryApiClient($currencyRegistryUrl, $this->serializer);
        }

        throw new Exception('UNKNOWN CURRENCY REGISTRY NAME');
    }
}