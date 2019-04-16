<?php

namespace App\Repository;

use App\Entity\ProProfil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProProfil|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProProfil|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProProfil[]    findAll()
 * @method ProProfil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProProfilRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProProfil::class);
    }

    // /**
    //  * @return ProProfil[] Returns an array of ProProfil objects
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
    public function findOneBySomeField($value): ?ProProfil
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findByAvatar($id)
    {
        return $this->createQueryBuilder('a')
            ->select('a.avatar')
            ->andWhere('a.id = :val')
            ->getParameter('val')

    }
}
