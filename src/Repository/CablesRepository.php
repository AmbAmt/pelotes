<?php

namespace App\Repository;

use App\Entity\Cables;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Cables|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cables|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cables[]    findAll()
 * @method Cables[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CablesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cables::class);
    }

    // /**
    //  * @return Cables[] Returns an array of Cables objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Cables
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
