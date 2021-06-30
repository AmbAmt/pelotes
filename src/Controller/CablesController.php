<?php

namespace App\Controller;

use App\Entity\Cables;
use App\Form\CablesType;
use App\Repository\CablesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CablesController extends AbstractController
{
     /**
     * @Route("/cables", name="cables")
     */
    public function index(CablesRepository $repository): Response
    {
        return $this->render('cables/cables.html.twig', [
            "cables"=>$repository->findAll()
        ]);
    }

    /**
     * @Route("/cables/ajoutCables", name="ajoutCables")
     */
    public function ajoutAiguille(Request $request, EntityManagerInterface $entityManager) : Response{

        $cable = new Cables();
        $form = $this->createForm(CablesType::class, $cable);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($cable);
            $entityManager->flush();
            return $this->redirectToRoute("cables");
        }

        return $this->render('cables/ajoutCables.html.twig',[
            "form" => $form->createView()
            ]);
    }

    /**
     * @Route("/cables/modifCables/{id}", name="modifCables")
     */
    public function modifCables(Cables $cable, Request $request, EntityManagerInterface $entityManager) : Response {

        $form = $this->createForm(CablesType::class, $cable);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($cable);
            $entityManager->flush();
            return $this->redirectToRoute("cables");
        }

        return $this->render('cables/modifCables.html.twig',[
            "form" => $form->createView(),
            "cable" => $cable
        ]);
    }

    /**
     * @Route("/cable/supprimer/{id}", name="supprimerCables")
     */
    public function supprimerPelote(Cables $cable, EntityManagerInterface $entityManager, Request $request): Response {
        $entityManager->remove($cable);
        $entityManager->flush();
        return $this->redirectToRoute("cables");
    }

}
