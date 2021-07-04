<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="currency",
 *     indexes={
 *     @ORM\Index(columns={"currency"}),
 *     @ORM\Index(columns={"updated"})
 * })
 */
class Currency
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", length=3, unique=true)
     */
    private string $currency;

    /**
     * @ORM\Column(type="decimal", precision=22, scale=5)
     */
    private float $rate;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTime $updated;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): Currency
    {
        $this->id = $id;

        return $this;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): Currency
    {
        $this->currency = $currency;

        return $this;
    }

    public function getRate(): float
    {
        return $this->rate;
    }

    public function setRate(float $rate): Currency
    {
        $this->rate = $rate;

        return $this;
    }

    public function getUpdated(): DateTime
    {
        return $this->updated;
    }

    public function setUpdated(DateTime $updated): Currency
    {
        $this->updated = $updated;

        return $this;
    }
}