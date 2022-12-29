<?php

namespace App\Controller;

use App\Entity\Evenement;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @Route("/form", name="form")
     */
    public function index(): Response
    {
        return $this->render('form/index.html.twig', [
            'controller_name' => 'FormController',
        ]);
    }

    /**
     * @Route("/add", name="evenementAD")
     */

  /*  public function add(Request $request)
    {

        $evenement=new Evenement();
        $form=$this->createForm(   );
        $form->add('ajouter', SubmitType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() )
        {


            $em=$this->getDoctrine()->getManager();
            $em->persist($evenement);
            $em->flush();
            return $this->redirectToRoute('afficherEV');
        }


        return $this->render('evenement/ajouterEV.html.twig', [
            'form'=>$form->createView()
        ]);
    }*/

}
