<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Entity\Entretien;
use App\Form\CandidatType;
use App\Repository\CandidatRepository;
use App\Repository\EntretienRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CandidatController extends AbstractController
{
    #[Route('/candidat', name: 'app_candidat')]
    public function index(): Response
    {
        return $this->render('candidat/index.html.twig', [
            'controller_name' => 'CandidatController',
        ]);
    }
    // hsow only candidat with informatique
    #[Route('/candidat/showinfo', name:'show_info')]
    public function read(): Response  //[2]
        {
            // [3] [4] [5] [6]
        $candidats = $this->getDoctrine()->getRepository(Candidat::class)->findBy(["specialite"=>'Informatique']);
        return $this->render('candidat/read.html.twig', 
        [
            'candidats' => $candidats,
        ]);
        }
        // hsow only candidat with informatique
        #[Route('/candidat/getall', name:'get_all')]
        public function getAll(): Response   
            {
                 
            $candidats = $this->getDoctrine()->getRepository(Candidat::class)->findAll();
            return $this->render('candidat/all.html.twig', 
            [
                'candidats' => $candidats,
            ]);
            }

        #[Route('/candidat/planifier/{cin}', name:'planifiercandidat')]
        public function add(Request $request, $cin , CandidatRepository $rep)
        {
            $e = new Entretien();
            $c = $rep->find($cin) ;
            $e->setCandidat($c);
            $e->setEtat('test');
            $form = $this->createForm(CandidatType::class, $e);
            $form->handleRequest($request);
            if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($e);
            $em->flush();
            return $this->redirectToRoute("get_all");
            }
            return $this->render("candidat/add.html.twig",
            ["form" => $form->createView(), "c"=>$c]);
        }

        #[Route('/candidat/entretiens/{cin}', name: 'see_all')]
        public function allEntrient($cin, EntretienRepository $repo): Response
        {
            
            $entretients = $repo->listByCandidat($cin);
            return $this->render('entretien/entretients.html.twig', [
                'entretients' => $entretients,
            ]);
        }
        
    
}
