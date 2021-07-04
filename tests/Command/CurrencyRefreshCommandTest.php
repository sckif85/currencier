<?php

namespace App\Tests\Command;

use App\Tests\DataBaseDependTestCase;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class CurrencyRefreshCommandTest extends DataBaseDependTestCase
{
    private const DATE_IMPORT = '3000-01-01';

    public function testCurrencyImportedFromCentralBankToDataBase()
    {
        $application = new Application(self::$kernel);

        $command       = $application->find('app:currency:refresh');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'date' => self::DATE_IMPORT,
        ]);

        $currencyRepository = $this->entityManager->getRepository('App:Currency');

        $countOfCurrency = $currencyRepository->findOneBy([
            'currency' => 'USD',
            'updated'  => new DateTime(self::DATE_IMPORT),
        ]);

        $this->assertNotNull($countOfCurrency);
    }
}