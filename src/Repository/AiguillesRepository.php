<?php

namespace App\Repository;

use App\Entity\Aiguilles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Aiguilles|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aiguilles|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aiguilles[]    findAll()
 * @method Aiguilles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AiguillesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Aiguilles::class);
    }

    // /**
    //  * @return Aiguilles[] Returns an array of Aiguilles objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Aiguilles
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
