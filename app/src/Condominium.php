<?php
// src/Condominium.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'condominiums')]
class Condominium
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

    #[ORM\Column(length: 60)]
    private $email;

    /**
      * Many Suppliers have Many Condominiums
      * @var Collection(int, Supplier)
    */
    // Correct!!!
    #[ORM\ManyToMany(targetEntity: Supplier::class, mappedBy: 'condominium')]
    private Collection $suppliers;

    #[ORM\OneToMany(targetEntity: Property::class, mappedBy: 'condominium')]
    private Collection $properties;

    public function __construct()
    {
      $this->suppliers = new ArrayCollection();
      $this->properties = new ArrayCollection();
    }

    public function getSuppliers(): Collection
    {
      return $this->suppliers;
    }

    public function getId(): int|null
    {
        return $this->id;
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

    public function addSupplier(Supplier $supplier): void
    {
      $supplier->addSupplier($this); // synchronously updating inverse side
      $this->suppliers[] = $supplier;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}

?>
