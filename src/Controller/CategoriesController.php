<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesController extends AbstractController
{
    #[Route('/categories', name: 'app_categories')]
    public function index(EntityManagerInterface $entityManagerInterface, CategoriesRepository $categorieRepository): Response
    {   $categorie = $categorieRepository->findAll();
        return $this->render('categories/index.html.twig', [
            'controller_name' => 'CategoriesController',
            'categorie'=>$categorie
        ]);
    }
}
