<?php
// src/TypeExchangeRate.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'types_exchange_rates')]
class Typeexchangerate
{
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private int|null $id = null;

  #[ORM\Column(length: 20)]
  private $name;

  #[ORM\OneToMany(targetEntity: Exchangerate::class, mappedBy: 'typeexchangerate')]
  private Collection $exhangerates;

  public function __construct()
  {
    $this->exchangerates = new ArrayCollection();
  }

  public function getId(): int|null
  {
    return $this->id;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function setName(string $name): void
  {
    $this->name = $name;
  }
}

?>
