<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CentresdinteretsController extends AbstractController
{
    #[Route('/centresdinterets', name: 'app_centresdinterets')]
    public function index(): Response
    {
        return $this->render('centresdinterets/index.html.twig', [
            'controller_name' => 'CentresdinteretsController',
        ]);
    }
}
