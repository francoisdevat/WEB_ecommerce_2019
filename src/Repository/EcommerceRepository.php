<?php

namespace App\Repository;

use App\Entity\Ecommerce;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Ecommerce|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ecommerce|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ecommerce[]    findAll()
 * @method Ecommerce[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EcommerceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ecommerce::class);
    }

    // /**
    //  * @return Ecommerce[] Returns an array of Ecommerce objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ecommerce
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
