<?php

namespace App\Controller\RequestDTO;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\Request;

class ConvertRequest implements RequestDTOInterface
{
    /**
     * @Assert\NotBlank()
     * @Assert\Positive()
     */
    private ?float $value;

    /**
     * @Assert\NotBlank()
     */
    private ?string $currencyFrom;

    /**
     * @Assert\NotBlank()
     */
    private ?string $currencyTo;

    public function __construct(Request $request)
    {
        $this->value        = $request->get('value');
        $this->currencyFrom = $request->get('currency_from');
        $this->currencyTo   = $request->get('currency_to');
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getCurrencyFrom(): string
    {
        return $this->currencyFrom;
    }

    public function getCurrencyTo(): string
    {
        return $this->currencyTo;
    }
}