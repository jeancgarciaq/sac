<?php
// src/Role.php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'roles')]
class Role
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;
    #[ORM\Column(length: 60)]
    private $role;

    /**
     * Many Roles have Many Users
     * @var Collection<int, User>
    */
    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'role')]
    private Collection $users;

    /**
     * Many Roles have Many Permissions.
     * @var Collection<int, Permission>
     */
    #[ORM\JoinTable(name: 'roles_permissions')]
    #[ORM\ManyToMany(targetEntity: Permission::class, inversedBy: 'role')]
    private Collection $permissions;

    public function __construct() {
        $this->permissions = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getPermissions(): Collection
    {
        return $this->permissions;
    }

    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function getId(): int|null
    {
        return $this->id;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function addPermission(Permission $permission): void
    {
      $permission->addPermission($this); // synchronously updating inverse side
      $this->permissions[] = $permission;
    }

    public function addUser(User $user): void
    {
      $this->users[] = $user;
    }

    public function setRole(string $role): void
    {
      $this->role = $role;
    }
}

?>
