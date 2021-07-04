<?php

namespace App\Controller;

use App\Controller\RequestDTO\ConvertRequest;
use App\Entity\Currency;
use App\Service\Converter;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ConverterController extends AbstractController
{
    private ObjectRepository $currencyRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->currencyRepository = $entityManager->getRepository('App:Currency');
    }

    /**
     * @Route("/convert", format="json", methods={"GET"})
     * @param ConvertRequest $request
     * @param Converter      $converter
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function convertAction(ConvertRequest $request, Converter $converter): JsonResponse
    {
        $currencyFrom = $this->resolveCurrency($request->getCurrencyFrom());
        $currencyTo   = $this->resolveCurrency($request->getCurrencyTo());

        return new JsonResponse([
            'value' => $converter->convert($request->getValue(), $currencyFrom, $currencyTo),
        ]);
    }

    /**
     * @throws Exception
     */
    private function resolveCurrency($currencyName): Currency
    {
        $currencyName = mb_strtoupper($currencyName);

        $currency = $this->currencyRepository->findOneBy([
            'currency' => $currencyName,
        ]);

        if (is_null($currency)) {
            throw new Exception(sprintf('CURRENCY "%s" IS NOT EXISTS IN SERVICE', $currencyName));
        }

        return $currency;
    }
}