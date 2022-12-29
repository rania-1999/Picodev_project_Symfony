<?php

namespace App\Controller;

use App\Entity\Arbitre;
use App\Entity\Evenement;
use App\Entity\Gestion;
use App\Entity\Listeatt;
use App\Entity\Uti;
use App\Form\ArbitreType;
use App\Form\EvenementType;
//use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormTypeInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
//use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class EvenementController extends AbstractController
{
    /**
     * @Route("/evenement", name="evenement")
     */
    public function index(): Response
    {
        return $this->render('evenement/index.html.twig', [
            'controller_name' => 'EvenementController',
        ]);
    }

    /**
     * \Symfony\Component\HttpFoundation\Response
     * @Route("/afficherEV", name="afficherEV")
     */
   public function AfficherEV()
    {$evenement=$this->getDoctrine()->getRepository(Evenement::class)->findAll();
    return $this ->render('evenement/AfficherEV.html.twig',['evenement'=>$evenement]);
    }



    /**
     * @Route ("/supprimer/{idevenement}",name="d")
     */

    public  function Delete($idevenement)

    {  $evenement=$this->getDoctrine()->getRepository(Evenement::class)->find($idevenement);
    $em=$this->getDoctrine()->getManager();
    $em->remove($evenement);
    $em->flush();
    return $this->redirectToRoute('afficherEV');

    }

    /**
     * @param Request $request
     * @return Response
     * @Route ("addEvenement", name ="addEvenement")
     * Methode({"GET","POST"})
     */

    function add (Request $request):Response
    {
        $evenement =new Evenement();
        $form=$this->createForm( EvenementType:: class,$evenement);
        $form->add('Ajouter', SubmitType::class,[
            'attr' => ['class' => 'btn btn-primary'],
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
          $arbitre= $form->getData();
            $em=$this->getDoctrine()->getManager();
            $em->persist($evenement);
            $em->flush();
            return $this->redirectToRoute('afficherEV');
        }
        return $this->render('evenement/ajouterEV.html.twig',[
                'form'=>$form->createView()
            ]
        );
    }
/**
 * @Route ("/updateEV/{idevenement}", name ="updateEV")
 */
function  UpdateEV (Request $request,$idevenement)
{ $evenement=$this->getDoctrine()->getRepository(Evenement::class)->find($idevenement);
$form =$this->createForm(EvenementType::class,$evenement);
$form->add('update', SubmitType::class,[
        'attr' => ['class' => 'btn btn-primary'],
    ]

);
$form->handleRequest($request);
if ($form ->isSubmitted() && $form->isValid()){
    $em=$this->getDoctrine()->getManager();
    $em->flush();
    return $this->redirectToRoute('afficherEV');
}
    return $this->render('evenement/updateEV.html.twig',[
            'form'=>$form->createView()
        ]
    );
}
    private function getData(): array
    {
        /**
         * @var $evenement Evenement[]
         */
        $list = [];
        $evenement=$this->getDoctrine()->getRepository(Evenement::class)->findAll();

        foreach ($evenement as $evenement) {
            $list[] = [
                $evenement->getNomevenement(),
                $evenement->getDescripevenement(),
                $evenement->getDateevenement(),

                $evenement->getNbrePL()
            ];
        }
        return $list;
    }

    /**
     * @Route("/export",  name="export")
     */
    public function export()
    {
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setTitle('evenement List');

        $sheet->getCell('A1')->setValue(' Name');
        $sheet->getCell('B1')->setValue('Description');
        $sheet->getCell('C1')->setValue('date');
        $sheet->getCell('D1')->setValue('Nombre de place');


        // Increase row cursor after header write
        $sheet->fromArray($this->getData(),null, 'A2', true);


        $writer = new Xlsx($spreadsheet);

        $writer->save('document.xlsx');

        return $this->redirectToRoute('afficherEV');
    }


}
