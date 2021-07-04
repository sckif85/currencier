<?php

namespace App\Service;

use App\Entity\Currency;
use App\Http\CurrencyRegistryApiClientInterface;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;

class CurrencyImporter
{
    private CurrencyRegistryApiClientInterface $currencyRegistryApiClient;

    private EntityManagerInterface $entityManager;

    public function __construct(
        CurrencyRegistryApiClientInterface $currencyRegistryApiClient,
        EntityManagerInterface $entityManager
    ) {
        $this->currencyRegistryApiClient = $currencyRegistryApiClient;
        $this->entityManager             = $entityManager;
    }

    public function import(DateTime $importDate)
    {
        $currencyRepository = $this->entityManager->getRepository('App:Currency');

        $currencyRates = $this->currencyRegistryApiClient->getRegistryCurrencies();
        foreach ($currencyRates as $currencyRate) {
            /** @var Currency $currency */
            if ($currency = $currencyRepository->findOneBy([
                'currency' => $currencyRate->getCurrency(),
            ])) {
                $currency
                    ->setRate($currencyRate->getRate())
                    ->setUpdated($importDate);
            } else {
                $currency = (new Currency())
                    ->setCurrency($currencyRate->getCurrency())
                    ->setRate($currencyRate->getRate())
                    ->setUpdated($importDate);
                $this->entityManager->persist($currency);
            }
        }

        $this->entityManager->flush();
    }
}