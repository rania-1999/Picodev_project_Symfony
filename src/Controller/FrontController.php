<?php

namespace App\Controller;

use App\Entity\Arbitre;
use App\Entity\Evenement;
use App\Entity\Listeatt;
use App\Form\ArbitreType;
use App\Form\ListeattType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/front", name="front")
     */
    public function index(): Response
    {
        return $this->render('front.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }
    /**
     * \Symfony\Component\HttpFoundation\Response
     * @Route("/EV", name="EV")
     */
    public function AfficherEVFront()
    {$evenement=$this->getDoctrine()->getRepository(Evenement::class)->findAll();
        return $this ->render('front/evenement.html.twig',['evenement'=>$evenement]);
    }
    /**
     * \Symfony\Component\HttpFoundation\Response
     * @Route("/AR", name="AR")
     */
    public function AfficherARFront()
    {$arbitre=$this->getDoctrine()->getRepository(Arbitre::class)->findAll();
        return $this ->render('front/arbitre.html.twig',['arbitre'=>$arbitre]);
    }
    /**

     * @return \Symfony\Component\HttpFoundation\Response
     * @Route ("/PostulerAR",name="PostulerAR")
     */
    function Postuler (Request $request):Response
    {
        $listeatt =new Listeatt();
        $form=$this->createForm( ListeattType:: class,$listeatt);
        $form->add('submit', SubmitType::class, [
        'attr' => ['class' => 'btn btn-primary'],
]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($listeatt);
            $em->flush();


            return $this->redirectToRoute('AR');
        }
        return $this->render('front/postuler.html.twig',[
                'form'=>$form->createView()
            ]
        );
    }
}
