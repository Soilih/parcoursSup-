<?php

namespace App\Controller\admin;

use App\Entity\Pays;
use App\Form\PaysType;
use App\Repository\PaysRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
/**
 * @Route("/admin/pays")
 */
class PaysController extends AbstractController
{
    /**
     * @Route("/", name="pays_index", methods={"GET"})
     */
    public function index(PaysRepository $paysRepository , PaginatorInterface $paginator , Request $request ): Response
    {
       $pays = $paysRepository->findAll();
       $pays = $paginator->paginate(
         $pays , $request->query->getInt('page' , 1 ) , 
         3
       );
       return $this->render('pays/index.html.twig', [
        'pays'=>$pays    
        
            
        ]);
    }

    /**
     * @Route("/new", name="pays_new", methods={"GET","POST"})
     */
    public function new(Request $request ,  PaysRepository $paysRepository ): Response
    {
        $pay = new Pays();
        $form = $this->createForm(PaysType::class, $pay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pay);
            $entityManager->flush();
            return $this->redirectToRoute('pays_new', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pays/new.html.twig', [
            'pay' => $pay,
            'form' => $form,
            'pays' => $paysRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="pays_show", methods={"GET"})
     */
    public function show( Pays $pay): Response
    {
        return $this->render('pays/show.html.twig', [
            'pay' => $pay,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="pays_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Pays $pay): Response
    {
        $form = $this->createForm(PaysType::class, $pay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pays_new', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pays/edit.html.twig', [
            'pay' => $pay,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="pays_delete", methods={"POST"})
     */
    public function delete(Request $request, Pays $pay): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pay->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pay);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pays_new', [], Response::HTTP_SEE_OTHER);
    }
}
