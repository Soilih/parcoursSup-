<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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

     public function profile(): Response {

        return $this->render("admin/profile.html.twig" , [
            'profile'=>"je suis mohamed"
        ]);
     }
}
