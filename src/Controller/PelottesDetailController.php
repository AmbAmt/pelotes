<?php

namespace App\Controller;

use App\Entity\Pelotes;
use App\Repository\PelotesRepository;
use App\Form\PeloteFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PelottesDetailController extends AbstractController
{
    /**
     * @Route("/pelottes/detail/{id}", name="pelottes_detail")
     */
    public function index(PelotesRepository $repository, $id): Response
    {
        return $this->render('pelottes_detail/pelottesDetail.html.twig', [
            "pelotte" => $repository->find($id)
        ]);
    }

     /**
     * @Route("/pelottes/detail/modifPelottes/{id}", name="modifPelote")
     */
    public function ajoutPelotte(Pelotes $pelote,Request $request, EntityManagerInterface $entityManager) : Response {

        $form = $this->createForm(PeloteFormType::class, $pelote);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($pelote);
            $entityManager->flush();
            return $this->redirectToRoute("pelottes_detail", ["id"=>$pelote->getId()]);
        }

        return $this->render('pelottes_detail/modifPelottes.html.twig',[
            "form" => $form->createView(),
            "pelote" => $pelote
        ]);
    }

    /**
     * @Route("/pelottes/detail/supprimer/{id}", name="supprimerPelote")
     */
    public function supprimerPelote(Pelotes $pelote, EntityManagerInterface $entityManager, Request $request): Response {
        $entityManager->remove($pelote);
        $entityManager->flush();
        return $this->redirectToRoute("pelottes");
    }
}
