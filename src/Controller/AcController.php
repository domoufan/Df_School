<?php

namespace App\Controller;

use App\Entity\Ac;
use App\Repository\AcRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AcController extends AbstractController
{
    #[Route('/ac', name: 'app_ac')]
    public function index(AcRepository $repo, Request $request,PaginatorInterface $paginator): Response
    {
        $pagination = $paginator->paginate(
            $acs = $repo->findAll(),
            $request->query->getInt('page',1),2);

        $data = [
            'controller_name' => 'AcController',
            'Pagination' => $pagination,
        ];

        return $this->render('ac/index.html.twig', $data);
    }


    #[Route('/i_ac', name: 'app_i_ac')]
    public function insertion(AcRepository $repo, Request $request): Response
    {
        if ($request->isMethod('POST')) {
            extract($_POST);
            $ac = new Ac();
            $ac->setNomComplet($form['nomComplet']);
            $ac->setEmail($form['email']);
            $ac->setPassword($form['password']);
            $repo->add($ac, true);

            return $this->redirectToRoute('app_ac');
        }

        if ($request->isMethod('GET')) {
            $ac = new Ac();
            $form = $this->createFormBuilder($ac)
                ->add('nomComplet', TextType::class)
                ->add('email', EmailType::class)
                ->add('password', PasswordType::class)
                ->add('save', SubmitType::class,[
                    'attr'=>['class'=>'shadow btn btn-dark']
                ])
                ->getForm();

            $data = [
                'Form' => $form->createView(),
            ];
            return $this->render('ac/insert.html.twig', $data);
        }
    } 
    
    #[Route('/s_ac/{id}', name: 'app_s_ac')]
    public function supprimer($id,AcRepository $repo): Response
    {
        
        $ac = $repo->find($id);
        /* dd($ac); */
        $repo->remove($ac,true);

        return $this->redirectToRoute('app_ac');
    }
}
