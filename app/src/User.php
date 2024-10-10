<?php
// src/User.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'users')]
class User
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;

    #[ORM\Column(length: 60, unique: true)]
    private $username;

    #[ORM\Column(length: 128)]
    private $password;

    #[ORM\OneToOne(targetEntity: Owner::class, inversedBy: 'user')]
    #[ORM\JoinColumn(name: 'owner_id', referencedColumnName: 'id')]
    private Owner|null $owner = null;

    /**
     * Many Users have Many Roles.
     * @var Collection<int, Role>
    */
    #[ORM\JoinTable(name: 'users_roles')]
    #[ORM\ManyToMany(targetEntity: Role::class, inversedBy: 'user')]
    private Collection $roles;

    public function __construct()
    {
        $this->roles = new ArrayCollection();
    }

    public function getRoles(): Collection
    {
        return $this->roles;
    }

    public function getId(): int|null
    {
      return $this->id;
    }

    public function getUsename(): string
    {
      return $this->username;
    }

    public function getPassword(): string
    {
      return $this->password;
    }

    public function getOwnerId(): int|null
    {
      return $this->owner_id;
    }

    public function addRole(Role $role): void
    {
            $role->addRole($this); // synchronously updating inverse side
            $this->roles[] = $role;
    }

    public function setUsername(string $username): void
    {
      $this->username= $username;
    }

    public function setPassword(string $password): void
    {
      $this->password = $password;
    }

    public function setOwner(int $owner): void
    {
      $this->owner = $owner;
    }
}

?>
