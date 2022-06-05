<?php

namespace App\Controller;

use App\Repository\AnneeScolaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnneeScolaireController extends AbstractController
{
    #[Route('/annee_scolaire', name: 'app_annee_scolaire')]
    public function index(AnneeScolaireRepository $repo): Response
    {
        $an = $repo->findAll();

        return $this->render('annee_scolaire/index.html.twig', [
            'An' => $an,
        ]);
    }
}
