<?php

namespace App\Controller;

use App\Entity\Aiguilles;
use App\Form\AiguillesType;
use App\Repository\AiguillesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AiguillesController extends AbstractController
{
    /**
     * @Route("/aiguilles", name="aiguilles")
     */
    public function index(AiguillesRepository $repository): Response
    {
        return $this->render('aiguilles/aiguilles.html.twig', [
            "aiguilles"=>$repository->findAll()
        ]);
    }
    /**
     * @Route("/aiguilles/ajoutAiguille", name="ajoutAiguille")
     */
    public function ajoutAiguille(Request $request, EntityManagerInterface $entityManager) : Response{

        $aiguille = new Aiguilles();
        $form = $this->createForm(AiguillesType::class, $aiguille);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($aiguille);
            $entityManager->flush();
            return $this->redirectToRoute("aiguilles");
        }

        return $this->render('aiguilles/ajoutAiguilles.html.twig',[
            "form" => $form->createView()
            ]);
    }

    /**
     * @Route("/aiguilles/modifAiguilles/{id}", name="modifAiguilles")
     */
    public function modifAiguilles(Aiguilles $aiguille, Request $request, EntityManagerInterface $entityManager) : Response {

        $form = $this->createForm(AiguillesType::class, $aiguille);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($aiguille);
            $entityManager->flush();
            return $this->redirectToRoute("aiguilles");
        }

        return $this->render('aiguilles/modifAiguilles.html.twig',[
            "form" => $form->createView(),
            "aiguille" => $aiguille
        ]);
    }

    /**
     * @Route("/aiguilles/supprimer/{id}", name="supprimerAiguille")
     */
    public function supprimerPelote(Aiguilles $aiguille, EntityManagerInterface $entityManager, Request $request): Response {
        $entityManager->remove($aiguille);
        $entityManager->flush();
        return $this->redirectToRoute("aiguilles");
    }
}
