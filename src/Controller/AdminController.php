<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Entity\User;
use App\Entity\Langue;
use App\Entity\Experience;
use App\Entity\FluxSortant;
use App\Entity\Flux;
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
     * *@Route("/users" , name="home_accueil")
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
     * @Route("/", name="app_login")
     */
    public function login(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * cette controller permet de creer le profile uytilisateur
     * @Route("/profile" , name="profile")
     */

    public function profile(): Response
    {
        return $this->render("admin/profile.html.twig", [
            'profile'=>"je suis mohamed"
        ]);
    }

   
    /**
     * @route( "/etudiants" ,  name="listetudiant")
     *
     */

    public function  listeEtudiant(EtudiantRepository   $etudiantRepository ): Response {
        return $this->render("admin/listeEtudiant.html.twig" , [
            'nos_etudiant'=>$etudiantRepository->findAll()
        ]
         );
    }
   
}

