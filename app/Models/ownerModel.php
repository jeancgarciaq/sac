<?php 

namespace app\models;
use app\models\mainModel;

class ownerModel
{		
	private string $newName;
	private string $newPhone;
	private string $newEmail;
	private int $newId;

	public function setName(string $name) {
		$this->newName = $newName;
	}

	public function getNewName(string $phone)
	{
		return $this->newName;
	}

	public function setPhone(string $phone)
	{
		$this->newPhone = $newPhone;
	}

	public function getNewPhone(): string
	{
		return $this->newPhone
	}

	public function setNewEmail(string $email)
	{
		$this->newEmail = $newEmail;
	}

	public function getNewEmail(): string
	{
		return $this->newEmail
	}

	public function addUser(string $newName, string $newPhone, string $newEmail) 
	{
		
		$newName = $this->clearVariable($newName);
		$newPhone = $this->clearVariable($newPhone);
		$newEmail = $this->clearVariable($newEmail);

		$owner = new Owner();
		$owner->setName = $newName;
		$owner->setPhone = $newPhone;
		$owner->setEmail = $newEmail;

		$entityManager->persist($owner);
		$entityManager->flush();

		return "Owner created success with ID: ".$owner->getId().".";
	}

	public function searchOwners()
	{
		$ownerRepository = $entityManager->getReposity('Owner');
		$owners = $ownerRepository->findAll();

		foreach($owners as $owner) {
			echo sprintf("-%s\n", $owner->getName());
		}

	}

	public function searchOwnerId(int $newId)
	{
		$id = $newId;

		$owner = $entityManager->find('Owner', $id);

		if($owner === null)
		{
			return "No owner found";
		} else
		{
			return sprintf("-%s\n", $owner->getName());
		}
	}

	public function updateOwner(string $newName, string $newPhone, string $newEmail, int $newId)
	{
		$id = $this->clearVariable($newId);
		$name = $this->clearVariable($newName);
		$email = $this->clearVariable($newEmail);
		$phone = $this->clearVariable($newPhone);

		$owner = $entityManager->find('Owner', $id);

		if($owner === null)
		{
			return "No owner found";
		} else
		{
			$owner->setName($newName);
			$owner->setPhone($newPhone);
			$owner->setEmail($newEmail);

			$entityManager->flush();

			return "Owner updated success with ID: ".$owner->getId().".";
		}	
	}

	public function deleteOwner(int $newId)
	{
		$id = $newId;

		$owner = $entityManager->find('Owner', $id);

		if($owner === null)
		{
			return "No owner found";
		} else
		{
			$entityManager->remove($owner);
			$entityManager->flush();

			return "Owner deleted success!";
		}
	}

}