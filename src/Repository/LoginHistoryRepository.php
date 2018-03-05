<?php

namespace App\Repository;

use App\Entity\LoginHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class LoginHistoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LoginHistory::class);
    }

    public function findUserLastLogin(int $userId)
    {
        return $this->createQueryBuilder('l')
            ->select('l')
            ->where('l.user = :userId')->setParameter('userId', $userId)
            ->orderBy('l.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getSingleResult()
            ;
    }

}
