<?php

namespace App\Controller;

use App\Entity\Pelotes;
use App\Form\PeloteFormType;
use App\Repository\PelotesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Repository\RepositoryFactory;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PelottesController extends AbstractController
{
    /**
     * @Route("/", name="pelottes")
     */
    public function index(PelotesRepository $repository): Response
    {
        return $this->render('pelottes/pelottes.html.twig', [
            "pelotes"=> $repository->findAll()
        ]);
    }
    /**
     * @Route("/pelottes/ajoutPelottes", name="ajoutPelote")
     */
    public function ajoutPelotte(Request $request, EntityManagerInterface $entityManager) : Response {

        $pelote = new Pelotes();
        $form = $this->createForm(PeloteFormType::class, $pelote);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($pelote);
            $entityManager->flush();
            return $this->redirectToRoute("pelottes");
        }

        return $this->render('pelottes/ajoutPelottes.html.twig',[
            "form" => $form->createView()
        ]);
    }
}
