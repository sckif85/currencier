<?php

namespace App\Command;

use App\Service\CurrencyImporter;
use DateTime;
use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CurrencyRefreshCommand extends Command
{
    private CurrencyImporter $currencyImporter;

    public function __construct(CurrencyImporter $currencyImporter)
    {
        $this->currencyImporter = $currencyImporter;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('app:currency:refresh')
            ->addArgument('date', InputArgument::OPTIONAL, 'Дата импорта');
    }

    /**
     * @throws Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $date = new DateTime($input->getArgument('date'));
        $this->currencyImporter->import($date);

        return self::SUCCESS;
    }
}