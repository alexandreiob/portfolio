<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request): Response
    {
        // Récupère la valeur actuelle du mode sombre depuis la session
        $isDarkMode = $request->getSession()->get('isDarkMode', false);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'isDarkMode' => $isDarkMode,
        ]);
    }

    public function toggleDarkMode(Request $request): JsonResponse
    {
        $isDarkMode = $request->request->get('isDarkMode', false);

        // Stocke la préférence dans la session
        $request->getSession()->set('isDarkMode', $isDarkMode);

        return new JsonResponse(['success' => true]);
    }
}
