<?php
// src/Permission.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'permissions')]
class Permission
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;

    #[ORM\Column(length: 60)]
    private $permission;

    /**
     * Many Permissions have Many Roles.
     * @var Collection<int, Role>
    */
    #[ORM\ManyToMany(targetEntity: Role::class, mappedBy: 'permission')]
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

    public function getName(): string
    {
        return $this->name;
    }

    public function addRole(Role $role): void
    {
        $role->addRole($this); // synchronously updating inverse side
        $this->roles[] = $role;
    }

    public function setPermission(string $permision): void
    {
        $this->permission = $permission;
    }
}

?>
