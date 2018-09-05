<?php

namespace App\Controller;

use App\Service\Products;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Products $productsServise)
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'products' => $productsServise->getTop(),
        ]);
    }
}
