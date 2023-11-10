<?php

namespace App\Controller;

use App\Repository\EntretienRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EntretienController extends AbstractController
{
    #[Route('/entretien', name: 'app_entretien')]
    public function index(): Response
    {
        return $this->render('entretien/index.html.twig', [
            'controller_name' => 'EntretienController',
        ]);
    }

    // #[Route('/entretien/{cin}', name: 'see_all')]
    // public function allEntrient($cin, EntretienRepository $repo): Response
    // {
    //     dd('cin', $cin);
    //     $entretients = $repo->listByCandidat($cin);
    //     return $this->render('entretien/entretients.html.twig', [
    //         'entretients' => $entretients,
    //     ]);
    // }
}
