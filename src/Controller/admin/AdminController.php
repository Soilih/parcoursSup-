<?php

namespace App\Controller\admin;

use App\Entity\Etudiant;
use App\Entity\User;
use App\Entity\Langue;
use App\Entity\Experience;
use App\Entity\FluxSortant;
use App\Entity\Flux;
use App\Entity\Pays;
use App\Entity\ParcoursUniversitaire;
use App\Entity\ParcousColaire;
use App\Repository\EtudiantRepository;
use App\Repository\ExperienceRepository;
use App\Repository\FluxRepository;
use App\Repository\FluxSortantRepository;
use App\Repository\LangueRepository;
use App\Repository\ParcoursUniversitaireRepository;
use App\Repository\ParcousColaireRepository;
use App\Repository\ResponsableRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session; 


use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class AdminController extends AbstractController 
{
    
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    //je cree une  qui redirige l'utilisateur apres la connexion
    /**
     * @Route("/login/redirect" , name="_login_redirect")
     * Redirect users after login based on the granted ROLE
     */
    public function loginRedirect(Request $request)
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('admin');

        } else {
            return $this->redirectToRoute('home_accueil');
        }
    }

    /**
     * @Route("/users" , name="home_accueil")
     */
    public function Accueil_user(
        EtudiantRepository $etudiantRepository,
        ResponsableRepository $responsableRepository,
        ParcoursUniversitaireRepository $parcoursUniversitaire,
        ExperienceRepository $experienceRepository,
        LangueRepository $langueRepository,
        ParcousColaireRepository $parcousColaireRepository,
        FluxRepository $fluxRepository,
        FluxSortantRepository $fluxSortantRepository
    ): Response {
        return $this->render('admin/home_user.html.twig', [
                'etudiants'    =>   $etudiantRepository->findAll(),
                 "responsables" =>$responsableRepository->findAll() ,
                 "parcours_universitaires" => $parcoursUniversitaire->findAll(),
                 "parcous_colaires" => $parcousColaireRepository->findAll(),
                 "experiences"  => $experienceRepository->findAll(),
                 'langues'     => $langueRepository->findAll() ,
                 'fluxes'  => $fluxRepository->findAll() ,
                 "fluxSortants"=> $fluxSortantRepository->findAll()
        ]);
    }
   

    /**
     * cette controller permet de creer le profile uytilisateur
     * @Route("/profile" , name="profile")
     */

    public function profile(): Response
    {
        return $this->render("admin/profile.html.twig");
    }

   
    /**
     * @route( "/etudiants/" ,  name="listetudiant")
     *
     */

    public function  listeEtudiant(EtudiantRepository $etudiantRepository ): Response {
       
        return $this->render("admin/listeEtudiant.html.twig" , [
            'nos_etudiant'=> $etudiantRepository->findBy([],['nom' => 'ASC'])
        ]
         );
    }


     /**
     * @route( "/etudiantsdetail/" ,  name="listetudiantdetail")
     */

    public function  listeEtudiantDetail(FluxRepository $fluxRepository ): Response {
        return $this->render("admin/listefluxEntrant.twig" , [
            'nos_etudiant'=>$fluxRepository->listeFluxEtudiant()
        ]
         );
    }

       /**
     * @route( "/etudiantfluxsortant/" ,  name="fluxStantEtudiant")
     *
     */

    public function  listeEtudiantFluxSortant(FluxSortantRepository  $fluxSortantRepository ): Response {
        return $this->render("admin/listeFluxSortant.html.twig" , [
            'nos_etudiant'=>$fluxSortantRepository->listeFluxSortantEtudiant()
        ]
         );
    }

     /**
     * @route( "/etudiantsss/{id}" ,  name="listetudiantDetailEtudiant")
     *
     */

    public function  listeEtudiantDetails(EtudiantRepository $etudiantRepository , $id ): Response {
      
         $repo=$etudiantRepository->findByExampleField($id);

        return $this->render("admin/DetailEtudiantId.html.twig" , [
            "nos_etudiant"=>$repo 
        ]);
    }

     /**
     * @route( "/responsables/" ,  name="listeResponsable")
     *
     */

    public function  listeResponsable(ResponsableRepository $responsableRepository ): Response {
        return $this->render("admin/Responsable.html.twig" , [
            'nos_etudiant'=>$responsableRepository->listeDesResponsable()
        ]
         );
    }

    /**
     * @Route("/stat"  , name="statistique")
     */
    public  function  staticPays(FluxSortantRepository $fluxSortantRepository){
      //on va rechercher la liste des fluxSortant 
      $fluxSortant  = $fluxSortantRepository->findAll();
      
      //je sais que j'ai besoins de dateDepart , pays , colors 
      $dep = [];
      $pays = [];
      $userConut= [];

      //je push les valeur 

      foreach ($fluxSortant as $flux ) {
          $dep[] = $flux->getDateDepart();
          $userConut[] = count( (array) $flux->getPays());
          $color[] = $flux->getPays()->getColors();
         
         
           
      }
      
       return $this->render("admin/index.html.twig" , [
           //j'encode les valeur au format json 
           'datedepart' => json_encode( $dep)  , 
           'user' =>json_encode($userConut), 
           'color'=>json_encode($color)
           
      ]); 
     
      
    }
    
   
}

