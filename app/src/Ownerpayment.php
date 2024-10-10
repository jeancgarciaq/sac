<?php
// src/OwnerPayment.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'owner_payments')]
class Ownerpayment
{
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private int|null $id = null;

  #[ORM\Column(length: 100)]
  private $description;

  #[ORM\Column(type: 'decimal', precision: 11, scale: 2)]
  private decimal $amount;

  #[ORM\Column(type: 'decimal', precision: 8, scale: 2)]
  private decimal $amountusd;

  #[ORM\Column(length: 20)]
  private $reference;

  #[ORM\Column(type: 'datetime')]
  private DateTime $date;

  #[ORM\ManyToOne(targetEntity: Bank::class, inversedBy: 'ownerpayment')]
  #[ORM\JoinColumn(name: 'bank_id', referencedColumnName: 'id')]
  private Bank|null $bank = null;

  #[ORM\ManyToOne(targetEntity: Exchangerate::class, inversedBy: 'ownerpayment')]
  #[ORM\JoinColumn(name: 'exchangerate_id', referencedColumnName: 'id')]
  private ExchangeRate|null $exchangerate = null;

  #[ORM\ManyToOne(targetEntity: Owner::class, inversedBy: 'ownerpayment')]
  #[ORM\JoinColumn(name: 'owner_id', referencedColumnName: 'id')]
  private Owner|null $owner = null;

  /**
    * Many Owner Payments have many Accounts Receivable
    * @var Collection<int, Accountreceivable>
  */
  #[ORM\ManyToMany(targetEntity: Accountreceivable::class, inversedBy: 'ownerpayment')]
  #[ORM\JoinTable(name: 'ownerpayments_accountsreceivable')]
  private Collection $accountsreceivable;

  public function __construct()
  {
    $this->accountsreceivable = new ArrayCollection();
  }

  public function getAccountsReceivable(): Collection
  {
      return $this->accountsreceivable;
  }

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

  public function getBank(): Bank
  {
    return $this->bank;
  }

  public function getExchangeRate(): Exchangerate
  {
    return $this->exchangerate;
  }

  public function getOwner(): Owner
  {
    return $this->owner;
  }

  public function addAccountReceivable(Accountreceivable $accountreceivable): void
  {
    $accountreceivable->addAccountReceivable($this); // synchronously updating inverse side
    $this->accountsreceivable[] = $accountreceivable;
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

  public function setBankId(Bank $bank): void
  {
    $this->bank = $bank;
  }

  public function setExchangeRateId(Exchangerate $exchangerate): void
  {
    $this->exchangerate = $exchangerate;
  }

  public function setOwnerId(Owner $owner): void
  {
    $this->owner = $owner;
  }

}

?>
