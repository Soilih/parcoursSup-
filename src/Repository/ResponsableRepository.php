<?php

namespace App\Repository;

use App\Entity\Responsable;
use App\Entity\User;
use App\Entity\Etudiant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Responsable|null find($id, $lockMode = null, $lockVersion = null)
 * @method Responsable|null findOneBy(array $criteria, array $orderBy = null)
 * @method Responsable[]    findAll()
 * @method Responsable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResponsableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Responsable::class);
    }

    // /**
    //  * @return Responsable[] Returns an array of Responsable objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Responsable
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

     /**
  
     * @return Etudiant[]
     * @return User[]
     * @return Responsable[]
     */
    public function listeDesResponsable(): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
                           
            "SELECT  r.nom as n ,  r.prenom as pr ,  e.nom  as nm , e.prenom as prnm,  r.tel as t ,  r.revenu as rev  ,  r.proffession  as pro ,  u.email , r.adresse as ad , r.email as em ,   r.prenom 
             FROM App\Entity\Responsable r   , App\Entity\User u ,  App\Entity\Etudiant e 
             where r.user = u.id  AND e.user = u.id   order by e.nom ASC  
              "
             
        );

        // returns an array of Product objects
        return $query->getResult();
    }
}
