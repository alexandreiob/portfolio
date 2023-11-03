<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Cookie;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request): Response
    {
        // Récupère la valeur actuelle du mode sombre depuis la session
        $isDarkMode = $request->getSession()->get('isDarkMode', false);

        // Débogage : Affiche la valeur de $isDarkMode dans la console
        dump($isDarkMode);

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

    // Force la sauvegarde de la session
    $request->getSession()->save();

    // Créer le cookie avec la date d'expiration
    $cookie = new Cookie('darkMode', $isDarkMode ? '1' : '0', time() + 2592000); // 30 jours en secondes

    // Ajoute le cookie à la réponse
    $response = new JsonResponse(['success' => true]);
    $response->headers->setCookie($cookie);

    return $response;
}

}

