<?php

namespace App\Repository;

use App\Entity\Cimetiere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Cimetiere|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cimetiere|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cimetiere[]    findAll()
 * @method Cimetiere[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CimetiereRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cimetiere::class);
    }

    // /**
    //  * @return Cimetiere[] Returns an array of Cimetiere objects
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
    public function findOneBySomeField($value): ?Cimetiere
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
