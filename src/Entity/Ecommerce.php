<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EcommerceRepository")
 */
class Ecommerce
{
    

    /**
    *@Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     *@Assert\NotBlank
     * @ORM\Column(type="decimal", precision=5, scale=2, nullable=true)
     */
    private $price;

    /**
    *@Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $description;


public function getId()
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id = $id;

        return $this;
    }



   
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
 * @var int
 *
 * @ORM\Column(name="id", type="integer")
 * @ORM\Id
 * @ORM\GeneratedValue(strategy="AUTO")
 */
private $id;

/**
 * @ORM\Column(type="string")
 */
private $image_file;

/**
*@Assert\NotBlank
 * @ORM\Column(type="integer")
 */
private $capacity;

/**
 * @ORM\OneToMany(targetEntity="App\Entity\Registration", mappedBy="article")
 */
private $registrations;

public function __construct()
{
    $this->registrations = new ArrayCollection();
}



public function getCapacity(): ?int
{
    return $this->capacity;
}

public function setCapacity(int $capacity): self
{
    $this->capacity = $capacity;

    return $this;
}

public function getImageFile(): ?string
{
    return $this->image_file;
}

public function setImageFile( string $image_file): self
{
    $this->image_file = $image_file;

    return $this;
}

/**
 * @return Collection|Registration[]
 */
public function getRegistrations(): Collection
{
    return $this->registrations;
}

public function addRegistration(Registration $registration): self
{
    if (!$this->registrations->contains($registration)) {
        $this->registrations[] = $registration;
        $registration->setArticle($this);
    }

    return $this;
}

public function removeRegistration(Registration $registration): self
{
    if ($this->registrations->contains($registration)) {
        $this->registrations->removeElement($registration);
        // set the owning side to null (unless already changed)
        if ($registration->getArticle() === $this) {
            $registration->setArticle(null);
        }
    }

    return $this;
}
}
