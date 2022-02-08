<?php

namespace App\Repository;

use   App\Entity\Etudiant;
use   App\Entity\Langue;
use   App\Entity\User;
use   App\Entity\Experience;
use   App\Entity\ParcoursUniversitaire;
use   App\Entity\ParcousColaire;
use   App\Entity\Responsable;
use   App\Entity\Flux;
use   App\Entity\FluxSortant;
use   App\Entity\Pays;
use   App\Entity\Niveau;
use   Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use   Doctrine\Persistence\ManagerRegistry;
use   Doctrine\ORM\EntityManagerInterface;
use   Doctrine\ORM\Query\Parameter;


/**
 * @method Etudiant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Etudiant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Etudiant[]    findAll()
 * @method Etudiant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtudiantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Etudiant::class);
    }

    /**
     * @return Etudiant[] Returns an array of Etudiant objects
     * @return User[] 
     */
   
    public function findByExampleField($value )
    {
      $entityManager = $this->getEntityManager();
      $query = $entityManager->createQuery(
            "SELECT e.nom  , u.email , u.tel , l.libelle  
            FROM App\Entity\Etudiant e   
            LEFT JOIN  User ON  e.id = u.id  AND 
            LEFT JOIN  Langue   ON  l.user = u.id 

            WHERE     u.id = :id"
        )
        ->setParameter('id', $value);
         return $query->getResult();
    }
  

    /*
    public function findOneBySomeField($value): ?Etudiant
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
   


    // public function listeDesetudiant($id)
    // {
       
    //     return $this->createQueryBuilder('e')
    //    // ->leftJoin("e.user", "u")->addSelect("u") 
    //    // ->leftJoin("e.pays", "p")->addSelect("p") 
    //     ->setParameter('e.id ', $id)
    //     ->orderBy('e.id', 'ASC')
    //     ->andWhere("e.id = :id  ")
    //     ->getQuery()
    //     ->getSingleResult()   
    //     ;
    // }

    /**
     * @return Flux[]
     * @return Etudiant[]
     * @return User[]
     * @param $id
     * @throws \Exception
     */
    // public function listeEtudiant(): array
    // {
    //     $entityManager = $this->getEntityManager();

    //     $query = $entityManager->createQuery(
                           
    //         "SELECT  f.filiere , e.nom , u.tel , u.email , e.adresse ,  e.prenom , p.libelle , f.titreUniversite , f.diplome 
    //          FROM App\Entity\Flux f   , App\Entity\User u ,  App\Entity\Etudiant e , App\Entity\Pays p 
    //          where f.user = u.id  AND e.user = u.id  AND  f.pays = p.id "
    //     );
    //    // $query->setParameter("u" , $id )
    //      ->$query->getQuery();
    //     // returns an array of Product objects
    //     return  $query->getResult();
    // }


   
   
}
