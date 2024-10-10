<?php
// src/Property.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'properties')]
class Property
{
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private int|null $id = null;

  #[ORM\Column(length: 10)]
  private $number;

  #[ORM\ManyToOne(targetEntity: Condominium::class, inversedBy: 'property')]
  #[ORM\JoinColumn(name: 'condominium_id', referencedColumnName: 'id')]
  private Condominium|null $condominium = null;

  #[ORM\ManyToOne(targetEntity: Owner::class, inversedBy: 'property')]
  #[ORM\JoinColumn(name: 'owner_id', referencedColumnName: 'id')]
  private Owner|null $owner = null;

  #[ORM\ManyToOne(targetEntity: Aliquot::class, inversedBy: 'property')]
  #[ORM\JoinColumn(name: 'aliquot_id', referencedColumnName: 'id')]
  private Aliquot|null $aliquot = null;

  /**
   * Many Properties have Many Accounts Receivable.
   * @var Collection<int, Accountreceivable>
   */
  #[ORM\ManyToMany(targetEntity: Accountreceivable::class, mappedBy: 'property')]
  private Collection $accountsreceivable;

  public function __construct() {
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

  public function getNumber(): string
  {
    return $this->number;
  }

  public function getCondominium(): Condominium
  {
    return $this->condominium;
  }

  public function getOwner(): Owner
  {
    return $this->owner;
  }

  public function getAliquot(): Aliquot
  {
    return $this->aliquot;
  }

  public function addAccountReceivable(Accountreceivable $accountreceivable): void
  {
    $accountreceivable->addAccountReceivable($this); // synchronously updating inverse side
    $this->accountsreceivable[] = $accountreceivable;
  }

  public function setCondominium(Condominium $condominium): void
  {
    $this->condominium = $condominium;
  }

  public function setOwner(Owner $owner): void
  {
    $this->owner = $owner;
  }

  public function setAliquot(Aliquot $aliquot): void
  {
    $this->aliquot = $aliquot;
  }

  public function setNumber(string $number): void
  {
    $this->number = $number;
  }

}

?>
