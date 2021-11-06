<?php

namespace App\Repository;

use App\Entity\ParcousColaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ParcousColaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParcousColaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParcousColaire[]    findAll()
 * @method ParcousColaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParcousColaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ParcousColaire::class);
    }

    // /**
    //  * @return ParcousColaire[] Returns an array of ParcousColaire objects
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
    public function findOneBySomeField($value): ?ParcousColaire
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
