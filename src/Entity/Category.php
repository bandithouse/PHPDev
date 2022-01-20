<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 * @UniqueEntity(fields={"name"})
 * @Serializer\ExclusionPolicy(policy="NONE")
 */
class Category extends AbstractEntity
{

    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=false, unique=true)
     * @Assert\Length(min=5, max=20)
     * @Serializer\Expose()
     * @Serializer\Type("string")
     */
    private $name = null;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Category
     */
    public function setName(string $name): Category
    {
        $this->name = $name;
        return $this;
    }
}