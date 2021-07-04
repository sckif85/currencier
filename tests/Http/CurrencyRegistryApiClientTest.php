<?php

namespace App\Tests\Http;

use App\Http\CurrencyRegistryApiClientFactory;
use App\Http\CurrencyRegistryApiClientInterface;
use App\Http\Model\RegistryCurrency;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CurrencyRegistryApiClientTest extends KernelTestCase
{
    private ?CurrencyRegistryApiClientInterface $currencyRegistryApiClient;

    public function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->currencyRegistryApiClient = $kernel->getContainer()->get('currency_registry_api_client');
    }

    public function testFetchCurrencyRates()
    {
        $registryCurrencies = $this->currencyRegistryApiClient->getRegistryCurrencies();

        $this->assertNotCount(0, $registryCurrencies);

        /** @var RegistryCurrency $registryCurrency */
        $registryCurrency = array_shift($registryCurrencies);

        $this->assertNotEmpty($registryCurrency->getCurrency());
        $this->assertNotEquals(0, $registryCurrency->getRate());
    }
}