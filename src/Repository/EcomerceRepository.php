<?php

namespace App\Repository;

use App\Entity\Ecomerce;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Ecomerce|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ecomerce|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ecomerce[]    findAll()
 * @method Ecomerce[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EcomerceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ecomerce::class);
    }

    // /**
    //  * @return Ecomerce[] Returns an array of Ecomerce objects
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
    public function findOneBySomeField($value): ?Ecomerce
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
