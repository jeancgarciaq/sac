<?php
// src/ExchangeRate.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'exchange_rates')]
class Exchangerate
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;

    #[ORM\Column(type:'decimal', precision: 8, scale: 2)]
    private decimal $amount;

    #[ORM\Column(type: 'datetime')]
    private DateTime $date;

    #[ORM\OneToMany(targetEntity: Accountreceivable::class, mappedBy: 'exchangerate')]
    private Collection $accountsreceivable;

    #[ORM\OneToMany(targetEntity: Ownerpayment::class, mappedBy: 'exchangerate')]
    private Collection $ownerpayments;

    #[ORM\ManyToOne(targetEntity: Typeexchangerate::class, inversedBy:'exchangerate')]
    private TypeExchangeRate|null $typeexchangerate = null;

    #[ORM\OneToMany(targetEntity: Bill::class, mappedBy: 'exchangerate')]
    private Collection $bills;

    public function __construct()
    {
      $this->accountsreceivable = new ArrayCollection();
      $this->bills = new ArrayCollection();
      $this->ownerpayments = new ArrayCollection();
    }

    public function getId(): int|null
    {
      return $this->id;
    }

    public function getDate(): Datetime
    {
      return $this->date;
    }

    public function getTypeExchangeRate(): Typeexchangerate
    {
      return $this->typeexchangerate;
    }

    public function setAmount(decimal $amount): void
    {
      $this->amount = $amount;
    }

    public function setDate(Datetime $date): void
    {
      $this->date = $date;
    }

    public function setTypeExchangeRate(Typeexchangerate $typeexchangerate): void
    {
      $this->typeexchangerate = $typeexchangerate;
    }

}

?>
