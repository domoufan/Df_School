<?php

namespace App\Controller;

use App\Repository\EtudiantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{
    #[Route('/etudiant', name: 'app_etudiant')]

    public function index(EtudiantRepository $repo): Response
    {
        $etudiant = $repo->findAll();
        
        $data =
        [
            'etudiants' => $etudiant
        ];
        
        return $this->render('etudiant/index.html.twig',$data);
    }

}
