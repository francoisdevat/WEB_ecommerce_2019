<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EcommerceRepository")
 */
class Ecommerce
{
    

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2, nullable=true)
     */
    private $price;

    /**
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
 * @ORM\Column(type="integer")
 */
private $capacity;



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
}
