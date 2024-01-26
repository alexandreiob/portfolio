<?php

// src/Controller/ProjectsController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectsController extends AbstractController
{
    /**
     * @Route("/projects/{id}", name="project_detail")
     */
    public function afficherProjet($id)
    {
        // Pour cet exemple, nous utilisons directement le lien de partage Google Drive
        $videoUrl = "https://youtu.be/pPFGJE9uiOg?si=nPvpTdvnynuJycmd";

        return $this->render('projects/index.html.twig', [
            'videoUrl' => $videoUrl,
        ]);
    }

/**
     * @Route("/projects/{id}/photos", name="project_photos")
     */
    public function afficherPhotosProjet($id)
    {
        // Simulez des données de photos
        $photos = [
            'vg1.png',
            'vg2.png',
            'vg3.png',
            'vg5.png',
            'vg6.png',
            'vg7.png',
            
            
            // Ajoutez d'autres photos selon vos besoins
        ];

        return $this->render('projects/photos.html.twig', [
            'photos' => $photos,
        ]);
    }

}


