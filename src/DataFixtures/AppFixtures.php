<?php

namespace App\DataFixtures;
use App\Entity\Categories;
use App\Entity\Projects;
use App\Entity\User; 
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        //https://picsum.photos/200/300
        //lien angular : https://github.com/camara92/Maboutique-GP-Angular-Ecommerce-
         for ($i = 0; $i < 14; $i++) {
            $projet = new Projects();
            $categorie =new Categories();
            $user = new User(); 
            $projet->setProjectname("Ma boutique ecommerce ");
            $projet->setContent("Un projet réalisé sous le framework Angular. Le but est de mettre mes compétences dans la pratique.");
            $projet->setImage("/imagesdatafixtures/angular.png");
            $projet->setCategorie("travail personnel");
            $projet->setDatedebut(new DateTime());
            $projet->setDatefin(new DateTime());
            //toujours la classe faker deant 
            $faker = Faker\Factory::create('fr_FR');
            $projet->setAuthor($faker->firstName()); 
            $projet->setTechno("Framework Angular"); 
            $projet->setLienGit("https://github.com/camara92/Maboutique-GP-Angular-Ecommerce-");
            // partie Symfony project en dur 
            $categorie->setName("Front End Developper"); 
            $categorie->setSlug("frontdevelopper"); 
            $categorie->setBrochureFilename("Le Grand David"); 
            
            $projet->setProjectname("YesCode ");
            $projet->setContent("Un projet réalisé sous le framework Symfony. Le but est de mettre mes compétences dans la pratique.");
            $projet->setImage("https://picsum.photos/200/300");
            $projet->setCategorie("travail pratique");
            $projet->setDatedebut(new DateTime());
            $projet->setDatefin(new DateTime());
            $projet->setAuthor($faker->name()); 
            $projet->setTechno("Framework Symfony"); 
            $projet->setLienGit("https://github.com/camara92/YesCode/");

     

            $user->setFirstname($faker->name());
            $user->setLastname($faker->name());
            $user->setPassword($faker->password());
            $user->setEmail($faker->email());
      
            
           

            $manager->persist($user);
            $manager->persist($categorie);

            $manager->persist($projet);
       }

        $manager->flush();

       
}
}