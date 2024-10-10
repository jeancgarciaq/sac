<?php
// src/Owner.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'owners')]
class Owner
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;

    #[ORM\Column(length: 60)]
    private $name;

    #[ORM\Column(length: 20)]
    private $phone;

    #[ORM\Column(length: 60, unique: true)]
    private $email;

    #[ORM\OneToOne(targetEntity: User::class, mappedBy: 'owner')]
    private User|null $user = null;

    #[ORM\OneToMany(targetEntity: Ownerpayment::class, mappedBy: 'owner')]
    private Collection $ownerpayments;

    #[ORM\OneToMany(targetEntity: Property::class, mappedBy: 'owner')]
    private Collection $properties;

    public function __construct()
    {
      $this->properties = new ArrayCollection();
      $this->ownerpayments = new ArrayCollection();
    }

    public function getId(): int|null
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
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
