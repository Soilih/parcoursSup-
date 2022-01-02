<?php

namespace App\Controller;

use App\Entity\ParcousColaire;
use App\Entity\User;
use App\Form\ParcousColaireType;
use App\Repository\ParcousColaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/parcous/colaire")
 */
class ParcousColaireController extends AbstractController
{
    /**
     * @Route("/", name="parcous_colaire_index", methods={"GET"})
     */
    public function index(ParcousColaireRepository $parcousColaireRepository): Response
    {
        return $this->render('parcous_colaire/index.html.twig', [
            'parcous_colaires' => $parcousColaireRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="parcous_colaire_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $parcousColaire = new ParcousColaire();
        $parcousColaire->setUser($this->getUser());

        $form = $this->createForm(ParcousColaireType::class, $parcousColaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($parcousColaire);
            $entityManager->flush();

            return $this->redirectToRoute('parcous_colaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('parcous_colaire/new.html.twig', [
            'parcous_colaire' => $parcousColaire,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="parcous_colaire_show", methods={"GET"})
     */
    public function show(ParcousColaire $parcousColaire): Response
    {
        return $this->render('parcous_colaire/show.html.twig', [
            'parcous_colaire' => $parcousColaire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="parcous_colaire_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ParcousColaire $parcousColaire): Response
    {
        $form = $this->createForm(ParcousColaireType::class, $parcousColaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('parcous_colaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('parcous_colaire/edit.html.twig', [
            'parcous_colaire' => $parcousColaire,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="parcous_colaire_delete", methods={"POST"})
     */
    public function delete(Request $request, ParcousColaire $parcousColaire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$parcousColaire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($parcousColaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('parcous_colaire_index', [], Response::HTTP_SEE_OTHER);
    }
}
