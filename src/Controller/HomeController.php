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

    // Récupère le chemin de la route toggleDarkMode
    $toggleDarkModeRoute = $this->generateUrl('toggle_dark_mode');

    return $this->render('home/index.html.twig', [
        'controller_name' => 'HomeController',
        'isDarkMode' => $isDarkMode,
        'toggleDarkModeRoute' => $toggleDarkModeRoute,
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
