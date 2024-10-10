<?php
// src/Bill.php

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'bills')]
class Bill
{
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private int|null $id = null;

  #[ORM\Column(length: 150)]
  private $description;

  #[ORM\Column(type: 'decimal', precision: 8, scale: 2)]
  private decimal $amount;

  #[ORM\Column(type: 'decimal', precision: 8, scale: 2)]
  private decimal $amountusd;

  #[ORM\Column(type: 'datetime')]
  private DateTime $date;

  #[ORM\ManyToOne(targetEntity: Supplier::class, inversedBy: 'bill')]
  private Supplier|null $supplier = null;

  #[ORM\ManyToOne(targetEntity: Exchangerate::class, inversedBy: 'bill')]
  private Exchangerate|null $exchangerate = null;

  #[ORM\ManyToOne(targetEntity: Accountreceivable::class, inversedBy: 'bill')]
  private Accountreceivable|null $accountreceivable = null;

  public function getId(): int|null
  {
    return $this->id;
  }

  public function getDescription(): string
  {
    return $this->description;
  }

  public function getAmount(): decimal
  {
    return $this->amount;
  }

  public function getAmountUsd(): decimal
  {
    return $this->amountusd;
  }

  public function getDate(): date
  {
    return $this->date;
  }

  public function getSupplier(): Supplier
  {
    return $this->supplier;
  }

  public function getExchangeRate(): Exchangerate
  {
    return $this->exchangerate;
  }

  public function getAccountsReceivable(): Accountreceivable
  {
    return $this->accountreceivable;
  }

  public function setDescription(string $description): void
  {
    $this->description = $description;
  }

  public function setAmount(decimal $amount): void
  {
    $this->amount = $amount;
  }

  public function setAmountUsd(decimal $amountusd): void
  {
    $this->amountusd = $amountusd;
  }

  public function setDate(DateTime $date): void
  {
    $this->date = $date;
  }

  public function setSupplier(Supplier $supplier): void
  {
    $this->supplier = $supplier;
  }

  public function setExchangeRate(Exchangerate $exchangerate): void
  {
    $this->exchangerate = $exchangerate;
  }

  public function setAccountsReceivable(Accountreceivable $accountreceivable): void
  {
    $this->accountreceivable = $accountreceivable;
  }
}

?>
