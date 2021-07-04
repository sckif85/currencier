<?php

namespace App\Tests\Entity;

use App\Entity\Currency;
use App\Tests\DataBaseDependTestCase;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class CurrencyTest extends DataBaseDependTestCase
{
    private const CURRENCY_RATE = 12345678912.1234;

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function testCurrencyCanCreatedInDataBase()
    {
        $currency = (new Currency())
            ->setCurrency('RUR')
            ->setRate(self::CURRENCY_RATE)
            ->setUpdated(new \DateTime());

        $this->entityManager->persist($currency);
        $this->entityManager->flush();

        $currency = $this->entityManager->getRepository('App:Currency')->findOneBy([
            'currency' => 'RUR',
        ]);

        $this->assertNotNull($currency);
        $this->assertEquals(self::CURRENCY_RATE, $currency->getRate());
    }
}