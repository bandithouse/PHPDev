<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 * @UniqueEntity(fields={"name"})
 * @Serializer\ExclusionPolicy(policy="NONE")
 */
class Product extends AbstractEntity
{

    /**
     * @var string|null
     * @ORM\Column(type="string", length=20, nullable=false, unique=true)
     * @Assert\Length(min=5, max=20)
     * @Serializer\Expose()
     * @Serializer\Type("string")
     */
    private $name = null;

    /**
     * @var Category|null
     * @ORM\ManyToOne(targetEntity="Category")
     * @Serializer\Expose()
     * @Serializer\Type("App\Entity\Category")
     */
    private $category = null;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=4, nullable=false, unique=true)
     * @Assert\Length(max=4)
     * @Assert\Regex(pattern="/^[A-J]\d{3}$/")
     * @Serializer\Expose()
     * @Serializer\Type("string")
     */
    private $symbol = null;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return Product
     */
    public function setName(?string $name): Product
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Category|null
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * @param Category|null $category
     * @return Product
     */
    public function setCategory(?Category $category): Product
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSymbol(): ?string
    {
        return $this->symbol;
    }

    /**
     * @param string|null $symbol
     * @return Product
     */
    public function setSymbol(?string $symbol): Product
    {
        $this->symbol = $symbol;
        return $this;
    }
}