<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Repository\CategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;


class CategoriesController extends AbstractController
{
    #[Route('/categories', methods: ['GET'])] // endpoint(appel à l'Api)
        public function getCategoriesList(CategoriesRepository $repository) 
    {
        $Categories = $repository -> findByAllwithRelations(); // requête à la base de données Voir CategoriesRepository
        return $this->json($Categories, 200, [], [   // Renvoie tous les meubles en Json
            'groups' => ['api_Categories_get']  // les champs avec ce tag Voir Categories.php
        ]);
    }

    #[Route('/categories/{id}',requirements: ['id'=> Requirement::DIGITS],  methods: ['GET'])]
        public function getOneCategories(Categories $Categories)  // requête à la base de données Voir CategoriesRepository
        {
        return $this->json($Categories,200,[],[  //  Renvoie un seul memble en Json
            'groups' => ['api_Categories_get','api_one_Categories']  // les champs avec ces tags Voir Categories.php ET Categories.php
        ]);


    }
}


   