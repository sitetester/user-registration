<?php

namespace App\Repository;

use App\Entity\City;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class CityRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, City::class);
    }
    
    public function findByCountryCode(string $countryId)
    {
        return $this->createQueryBuilder('c')
            ->where('c.country = :country')->setParameter('country', $countryId)
            ->orderBy('c.name', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }

}
