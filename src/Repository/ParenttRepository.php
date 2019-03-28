<?php

namespace App\Repository;

use App\Entity\Parentt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Parentt|null find($id, $lockMode = null, $lockVersion = null)
 * @method Parentt|null findOneBy(array $criteria, array $orderBy = null)
 * @method Parentt[]    findAll()
 * @method Parentt[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParenttRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Parentt::class);
    }

    // /**
    //  * @return Parentt[] Returns an array of Parentt objects
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
    public function findOneBySomeField($value): ?Parentt
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
