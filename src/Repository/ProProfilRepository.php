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

    public function findcoord($value)
    {
        return $this->createQueryBuilder('p')
            ->select(['p.latitude', 'p.longitude', 'p.nom_entreprise'])
            ->andWhere('p.codepostal = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult()
            ;
    }
    public function findinfo($value)
    {
        return $this->createQueryBuilder('p')
            ->select(['p.nom_entreprise','p.mail','p.adresse','p.codepostal','p.ville','p.telephone','p.disponibilite','p.tarif','p.horaire'])
            ->andWhere('p.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult()
            ;
    }
}

