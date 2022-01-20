<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;

abstract class AbstractManager
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     * @required
     */
    public function setEntityManager(EntityManagerInterface $entityManager): void
    {
        $this->entityManager = $entityManager;
    }
    protected function saveEntity($entity): void
    {
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }
}