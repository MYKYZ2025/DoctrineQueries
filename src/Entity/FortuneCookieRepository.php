<?php

namespace App\Repository;

use App\Entity\Category;
use App\Entity\FortuneCookie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class FortuneCookieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FortuneCookie::class);
    }

    public function findRandom(): ?FortuneCookie
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT f FROM App\Entity\FortuneCookie f ORDER BY RAND()'
        )->setMaxResults(1);

        return $query->getOneOrNullResult();
    }
    public function findRnadomByCategory(Category $category): ?FortuneCookie
    {
        return $this->createQueryBuilder('f')
        ->where('f.category =:category')
        ->setParameter('category', $category)
        ->addOrderBy('RAND()', 'DESC')
        ->setMaxResults(1)
        ->getQuery()
        ->getOneOrNullResult();
    }
}