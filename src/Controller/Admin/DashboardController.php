<?php

namespace App\Controller\Admin;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\CategoriesCrudController;
use App\Entity\Categories;
use App\Entity\Projects;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{

    public function __construct(private AdminUrlGenerator $adminUrlGenerator){


    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //une crud administration very easiest for me Daouda 
        $url=$this->adminUrlGenerator
        ->setController(CategoriesCrudController::class)
        ->generateUrl();
        return $this->redirect($url); 

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('CAMARA || Developper Full');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
     
        yield MenuItem::linkToCrud('User', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Projets', 'fa-solid fa-wrench', Projects::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-bars', Categories::class);

      
    }
}
