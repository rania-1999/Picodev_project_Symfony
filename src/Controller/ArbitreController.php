<?php

namespace App\Controller;

use App\Entity\Arbitre;
use App\Entity\Evenement;
use App\Entity\Listeatt;
use App\Form\ArbitreType;
//use http\Env\Request;
use App\Form\EvenementType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;


class ArbitreController extends AbstractController
{
    /**
     * @Route("/arbitre", name="arbitre")
     */
    public function index(): Response
    {
        return $this->render('arbitre/index.html.twig', [
            'controller_name' => 'ArbitreController',
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route ("ajouterAR")
     */
    function add(Request $request): Response
    {
        $arbitre = new Arbitre();
        $form = $this->createForm(ArbitreType:: class, $arbitre);
        $form->add('Ajouter', SubmitType::class, [
            'attr' => ['class' => 'btn btn-primary'],
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($arbitre);
            $em->flush();


            return $this->redirectToRoute('afficherAR');
        }
        return $this->render('arbitre/ajouterAR.html.twig', [
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/afficherAR", name="afficherAR")
     */
    public function AfficherAR()
    {
        $arbitre = $this->getDoctrine()->getRepository(Arbitre::class)->findAll();
       // $listeatt = $this->getDoctrine()->getRepository(Listeatt::class)->findAll();
        return $this->render('arbitre/AfficherAR.html.twig', ['arbitre' => $arbitre]);
    }
    /**
     * @Route("/afficherPOS",  name="afficherPOS")
     */
    public function AfficherARP()
    {

        $listeatt = $this->getDoctrine()->getRepository(Listeatt::class)->findAll();
        return $this->render('arbitre/AfficherPOS.html.twig', ['listeatt' => $listeatt]);
    }

    /**
     * @Route ("/supprimerARP/{id}",name="dPAR")
     */

    public function DeletePost($id)

    {
        $listeatt = $this->getDoctrine()->getRepository(Listeatt::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($listeatt);
        $em->flush();
        return $this->redirectToRoute('afficherPOS');


    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route ( "/addP/{id}", name="addP")
     */
    function addPos($id)
    {

        $listeatt = $this->getDoctrine()->getRepository(Listeatt::class)->find($id);
        $arbitre=new Arbitre();

        $arbitre->setNom($listeatt->getNom());
        $arbitre->setPrenom($listeatt->getPrenom());
        $arbitre->setFiliere($listeatt->getFiliere());

        $arbitre->setImage($listeatt->getImage());
        $arbitre->setUpdatedAt($listeatt->getUpdatedAt());
        $arbitre->setDisponibilite('non');
//$arbitre->setDisponibilite("non");
            $em=$this->getDoctrine()->getManager();

                $em->persist($arbitre);

$em->remove($listeatt);

            $em->flush();
            return $this->redirectToRoute('afficherAR');

    }


    /**
     * @Route ("/supprimerAR/{id}",name="dAR")
     */

    public  function Delete($id)

    {  $arbitre=$this->getDoctrine()->getRepository(Arbitre::class)->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($arbitre);
        $em->flush();
        return $this->redirectToRoute('afficherAR');


    }
    /**
     * @Route ("/updateAR/{id}", name ="updateAR")
     */
    function  UpdateAR (Request $request,$id)
    { $arbitre=$this->getDoctrine()->getRepository(Arbitre::class)->find($id);
        $form =$this->createForm(ArbitreType::class,$arbitre);
        $form->add('update', SubmitType::class,[
                'attr' => ['class' => 'btn btn-primary'],
            ]

        );
        $form->handleRequest($request);
        if ($form ->isSubmitted() && $form->isValid()){



            $em=$this->getDoctrine()->getManager();





            $em->flush();
            return $this->redirectToRoute('afficherAR');
        }
        return $this->render('arbitre/updateAR.html.twig',[
                'form'=>$form->createView()
            ]
        );
    }



}
