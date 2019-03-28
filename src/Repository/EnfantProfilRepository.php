<?php

namespace App\Repository;

use App\Entity\EnfantProfil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EnfantProfil|null find($id, $lockMode = null, $lockVersion = null)
 * @method EnfantProfil|null findOneBy(array $criteria, array $orderBy = null)
 * @method EnfantProfil[]    findAll()
 * @method EnfantProfil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnfantProfilRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EnfantProfil::class);
    }

    // /**
    //  * @return EnfantProfil[] Returns an array of EnfantProfil objects
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
    public function findOneBySomeField($value): ?EnfantProfil
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
