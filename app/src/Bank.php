<?php
// src/Bank.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'banks')]
Class Bank
{
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private int|null $id = null;

  #[ORM\Column(length: 60, unique: true)]
  private $name;

  #[ORM\Column(length: 5, unique: true)]
  private $code;

  #[ORM\OneToMany(targetEntity: Ownerpayment::class, mappedBy: 'bank')]
  private Collection $ownerpayments;

  public function __construct()
  {
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

  public function getCode(): string
  {
    return $this->code;
  }

  public function setName(string $name): void
  {
    $this->name = $name;
  }

  public function setCode(string $code): void
  {
    $this->code = $code;
  }

}

?>
