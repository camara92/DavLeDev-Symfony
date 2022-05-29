<?php

namespace App\Controller;



use App\Repository\ProjectsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectsController extends AbstractController
{
    #[Route('/projects', name: 'app_projects')]
    public function index(EntityManagerInterface $entityManagerInterface, ProjectsRepository $projectRepository): Response
    {
        $projet = $projectRepository->findAll();
        return $this->render('projects/index.html.twig', [
            'controller_name' => 'ProjectsController',
            'project' => $projet
        ]);
    }
}
