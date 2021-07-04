<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ConverterControllerTest extends WebTestCase
{
    protected KernelBrowser $client;

    public function setUp(): void
    {
        $this->client = self::createClient();

        parent::setUp();
    }

    public function testConvert(): void
    {
        $this->client->request('GET', '/convert', [
            'value'         => 1,
            'currency_from' => 'USD',
            'currency_to'   => 'GBP',
        ]);

        $this->assertResponseIsSuccessful();

        $result = json_decode($this->client->getResponse()->getContent(), true);

        $this->assertArrayHasKey('value', $result);

        $this->assertIsFloat($result['value']);
    }
}