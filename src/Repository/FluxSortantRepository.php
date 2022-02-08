<?php

namespace App\Repository;

use App\Entity\FluxSortant;
use App\Entity\User;
use App\Entity\Etudiant;
use App\Entity\Pays;
use App\Entity\Niveau;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FluxSortant|null find($id, $lockMode = null, $lockVersion = null)
 * @method FluxSortant|null findOneBy(array $criteria, array $orderBy = null)
 * @method FluxSortant[]    findAll()
 * @method FluxSortant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FluxSortantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FluxSortant::class);
    }

    // /**
    //  * @return FluxSortant[] Returns an array of FluxSortant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FluxSortant
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /**
     * @return FluxSortant[]
     * @return Etudiant[]
     * @return User[]
     */
    public function listeFluxSortantEtudiant(): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
                           
            "SELECT  f.filiere , e.nom , u.tel , f.universite , n.libelle as lib , u.email , f.adresse ,  e.prenom , p.libelle , f.dateDepart
             FROM App\Entity\FluxSortant f   , App\Entity\User u , App\Entity\Niveau n  ,  App\Entity\Etudiant e , App\Entity\Pays p 
             where f.user = u.id  AND e.user = u.id  AND  f.niveau = n.id  AND  f.pays = p.id order by e.nom ASC  
              "
             
        );

        // returns an array of Product objects
        return $query->getResult();
    }


    /**
     * @return FluxSortant[]
     * @return Etudiant[]
     * @return User[]
     */
    public function NombreUserParPays(): array
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
          "SELECT  DATE_FORMAT(f.dateDepart , '%Y') as dt ,  COUNT(f.id) as c 
            FROM App\Entity\FluxSortant f  GROUP BY  f.dateDepart " 
  
        );
        return $query->getResult();
    }

}
