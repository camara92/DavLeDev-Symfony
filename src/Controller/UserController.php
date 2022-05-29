<?php

namespace App\Controller;



use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(EntityManagerInterface $entityManagerInterface, UserRepository $userRepository): Response
    {
        $user = $userRepository->findAll();
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'user' => $user
        ]);
    }
}
