<?php

namespace App\Repository;

use App\Entity\Pelotes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Pelotes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pelotes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pelotes[]    findAll()
 * @method Pelotes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PelotesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pelotes::class);
    }

    // /**
    //  * @return Pelotes[] Returns an array of Pelotes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Pelotes
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
