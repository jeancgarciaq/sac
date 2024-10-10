<?php
// src/Aliquot.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'aliquots')]
Class Aliquot
{
  #[ORM\Id]
  #[ORM\Column(type: 'integer')]
  #[ORM\GeneratedValue]
  private int|null $id = null;

  #[ORM\Column(type: 'smallfloat', unique: true)]
  private smallfloat $percentage;

  #[ORM\OneToMany(targetEntity: Property::class, mappedBy: 'aliquot')]
  private Collection $properties;

  public function __construct()
  {
    $this->properties = new ArrayCollection();
  }

  public function getId(): int|null
  {
    return $this->id;
  }

  public function getPercentage(): smallfloat
  {
    return $this->percentage;
  }

  public function setPercentage(smallfloat $percentage): void
  {
    $this->percentage = $percentage;
  }
}

?>
