<?php

namespace App\Controller;

use App\Repository\DemandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemandeController extends AbstractController
{
    #[Route('/demande', name: 'app_demande')]
    public function index(DemandeRepository $repo): Response
    {
        $demande = $repo->findAll();
        
        $data =
        [
            'Demande' => $demande
        ];

        return $this->render('demande/index.html.twig',);
    }
}
