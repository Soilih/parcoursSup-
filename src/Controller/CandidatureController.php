<?php

namespace App\Controller;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Candidature;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
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
use Symfony\Component\HttpFoundation\Request;

class CandidatureController extends AbstractController
{
    /**
     * @Route("/candidature", name="candidature")
     */
    public function validationDocssier(ManagerRegistry $doctrine): Response
    {   
        $entityManager = $doctrine->getManager();
        //j'instancie la cclasse Candidature 
        $candidat = new Candidature();
        $lastId = $candidat->getId();
       
            $candidat->setUser($this->getUser());
            $candidat->setStatus("0");
            $candidat->setTransmission(true);
            $candidat->setSoumission(true);
            $candidat->setValider(true);
            $entityManager->persist($candidat);
             //j'ajoute dans la base de donnees
             $entityManager->flush(); 

             return $this->render('candidature/index.html.twig',[
                 
             ]);
             
            
     }

    /**
     * @Route("/success" , name="succes")
     */
    public function  redirection():Response {
        return $this->render('candidature/success.html.twig');
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
        return $this->render('candidature/home_user.html.twig', [
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

   
}
