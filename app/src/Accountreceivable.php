<?php
// src/AcoountReceivable.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'accounts_receivable')]
class Accountreceivable
{
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private int|null $id = null;

  #[ORM\Column(length: 200)]
  private $description;

  #[ORM\Column(type: 'decimal', precision: 11, scale: 2)]
  private decimal $amount;

  #[ORM\Column(type: 'decimal', precision: 8, scale: 2)]
  private decimal $amountusd;

  #[ORM\Column(length: 20)]
  private $reference;

  #[ORM\Column(type: 'datetime')]
  private DateTime $date;

  #[ORM\ManyToOne(targetEntity: Exchangerate::class, inversedBy: 'accountreceivable')]
  #[ORM\JoinColumn(name: 'exchangerate_id', referencedColumnName: 'id')]
  private Exchangerate|null $exchangerate = null;

  /**
   * Many AccountReceivable have Many Properties.
   * @var Collection<int, Property>
  */
  #[ORM\ManyToMany(targetEntity: Property::class, inversedBy: 'accountreceivable')]
  #[ORM\JoinTable(name: 'properties_accountsreceivable')]
  private Collection $properties;

  /**
    * Many Accounts Receivable have Many Owner Payments
    * @var Collection<int, OwnerPayment>
  */
  #[ORM\ManyToMany(targetEntity: Ownerpayment::class, mappedBy: 'accountreceivable')]
  private Collection $ownerpayments;

  public function __construct()
  {
      $this->properties = new ArrayCollection();
      $this->ownerpayments = new ArrayCollection();
  }

  public function getProperties(): Collection
  {
      return $this->properties;
  }

  public function getOwnerPayments(): Collection
  {
      return $this->ownerpayments;
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

  public function getReference(): string
  {
    return $this->reference;
  }

  public function getDate(): DateTime
  {
    return $this->date;
  }

  public function getExchangeRate(): Exchangerate
  {
    return $this->exchangerate;
  }

  public function addProperties(Property $property): void
  {
          $property->addProperty($this); // synchronously updating inverse side
          $this->properties[] = $property;
  }

  public function addOwnerPayment(Ownerpayment $ownerpayment): void
  {
      $ownerpayment->addOwnerPayment($this); // synchronously updating inverse side
      $this->ownerpayments[] = $ownerpayment;
  }

  public function setDescription(string $description): void
  {
    $this->description = $description;
  }

  public function setAmount(decimal $amount): void
  {
    $this->amount = $amount;
  }

  public function setAmoundUsd(decimal $amount_usd): void
  {
    $this->amountusd = $amountusd;
  }

  public function setReference(string $reference): void
  {
    $this->reference = $reference;
  }

  public function setDate(DateTime $date): void
  {
    $this->date = $date;
  }

  public function setExchangeRate(Exchangerate $exchangerate): void
  {
    $this->exchangerate = $exchangerate;
  }

}

?>
