<?php

namespace App\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use JMS\Serializer\Serializer;

abstract class AbstractCurrencyRegistryApiClient implements CurrencyRegistryApiClientInterface
{
    private Client $apiClient;

    protected Serializer $serializer;

    private string $apiUrl;

    public function __construct(string $apiUrl, Serializer $serializer)
    {
        $this->serializer = $serializer;
        $this->apiClient  = new Client(
            [
                RequestOptions::TIMEOUT         => 3600,
                RequestOptions::ALLOW_REDIRECTS => false,
            ]
        );
        $this->apiUrl     = $apiUrl;
    }

    /**
     * @throws GuzzleException
     */
    protected function getCurrencyRegistryContent(): string
    {
        $result = $this->apiClient->get($this->apiUrl);
        return $result->getBody()->getContents();
    }
}