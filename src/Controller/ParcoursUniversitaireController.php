<?php

namespace App\Controller;

use App\Entity\ParcoursUniversitaire;
use App\Form\ParcoursUniversitaireType;
use App\Entity\User;
use App\Repository\ParcoursUniversitaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/parcours/universitaire")
 */
class ParcoursUniversitaireController extends AbstractController
{
    /**
     * @Route("/", name="parcours_universitaire_index", methods={"GET"})
     */
    public function index(ParcoursUniversitaireRepository $parcoursUniversitaireRepository): Response
    {
        return $this->render('parcours_universitaire/index.html.twig', [
            'parcours_universitaires' => $parcoursUniversitaireRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="parcours_universitaire_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $parcoursUniversitaire = new ParcoursUniversitaire();
        $parcoursUniversitaire->setUser($this->getUser());
        $form = $this->createForm(ParcoursUniversitaireType::class, $parcoursUniversitaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($parcoursUniversitaire);
            $entityManager->flush();

            return $this->redirectToRoute('parcours_universitaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('parcours_universitaire/new.html.twig', [
            'parcours_universitaire' => $parcoursUniversitaire,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="parcours_universitaire_show", methods={"GET"})
     */
    public function show(ParcoursUniversitaire $parcoursUniversitaire): Response
    {
        return $this->render('parcours_universitaire/show.html.twig', [
            'parcours_universitaire' => $parcoursUniversitaire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="parcours_universitaire_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ParcoursUniversitaire $parcoursUniversitaire): Response
    {
        $form = $this->createForm(ParcoursUniversitaireType::class, $parcoursUniversitaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('parcours_universitaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('parcours_universitaire/edit.html.twig', [
            'parcours_universitaire' => $parcoursUniversitaire,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="parcours_universitaire_delete", methods={"POST"})
     */
    public function delete(Request $request, ParcoursUniversitaire $parcoursUniversitaire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$parcoursUniversitaire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($parcoursUniversitaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('parcours_universitaire_index', [], Response::HTTP_SEE_OTHER);
    }
}
