<?php

namespace App\Repository;

use App\Entity\Flux;
use App\Entity\User;
use App\Entity\Etudiant;
use App\Entity\Pays;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Flux|null find($id, $lockMode = null, $lockVersion = null)
 * @method Flux|null findOneBy(array $criteria, array $orderBy = null)
 * @method Flux[]    findAll()
 * @method Flux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FluxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Flux::class);
    }

    
    /**
     * @return Flux[]
     * @return Etudiant[]
     * @return User[]
     */
    public function listeFluxEtudiant(): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
                           
            "SELECT  f.filiere , e.nom , u.tel , u.email , e.adresse ,  e.prenom , p.libelle , f.titreUniversite , f.diplome 
             FROM App\Entity\Flux f   , App\Entity\User u ,  App\Entity\Etudiant e , App\Entity\Pays p 
             where f.user = u.id  AND e.user = u.id  AND  f.pays = p.id order by e.nom ASC  
              "
             
        );

        // returns an array of Product objects
        return $query->getResult();
    }

    
    

    // /**
    //  * @return Flux[] Returns an array of Flux objects
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
    public function findOneBySomeField($value): ?Flux
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
