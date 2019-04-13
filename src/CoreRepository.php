<?php


namespace App;

use Doctrine\ORM\EntityManagerInterface;

/**
 * Class CoreRepository
 * @package App\Repository
 */
class CoreRepository
{
    /** @var EntityManagerInterface */
    protected $entityManager;

    /**
     * CoreRepository constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
}