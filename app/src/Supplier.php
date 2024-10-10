<?php
// src/Supplier.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'suppliers')]
class Supplier
{
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private int|null $id = null;

  #[ORM\Column(length: 60)]
  private $name;

  #[ORM\Column(length: 150)]
  private $address;

  #[ORM\Column(length: 20)]
  private $phone;

  #[ORM\Column(length: 60, unique: true)]
  private $email;

  /**
    * Many Suppliers have Many Condominiums
    * @var Collection(int, Condominium)
  */
  #[ORM\JoinTable(name: 'suppliers_condominiums')]
  #[ORM\ManyToMany(targetEntity: Condominium::class, inversedBy: 'suppliers')]
  private Collection $condominiums;

  #[ORM\OneToMany(targetEntity: Bill::class, mappedBy: 'supplier')]
  private Collection $bills;

  public function __construct()
  {
    $this->condominiums = new ArrayCollection();
    $this->bills = new ArrayCollection();
  }

  public function addCondominium(Condominium $condominium): void
  {
    $condominium->addCondominium($this); // synchronously updating inverse side
    $this->condominiums[] = $condominium;
  }

   /** @return Collection<int, Condominium> */
   public function getCondominiums(): Collection
   {
      return $this->condominiums;
   }

  public function getId(): int|null
  {
    return $this->supplier_id;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function getAddress(): string
  {
    return $this->address;
  }

  public function getPhone(): string
  {
    return $this->phone;
  }

  public function getEmail(): string
  {
    return $this->email;
  }

  public function setName(string $name): void
  {
    $this->name = $name;
  }

  public function setAddress(string $address): void
  {
    $this->address = $address;
  }

  public function setPhone(string $email): void
  {
    $this->phone = $phone;
  }

  public function setEmail(string $email): void
  {
    $this->email = $email;
  }
}

?>
