<?php

namespace App\Controller;

use App\Entity\Photo;
use App\Repository\PhotoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FrontController extends AbstractController
{
    #[Route('/', name: 'app_front')]
    public function index(PhotoRepository $photoRepository): Response
    {
        $photos = $photoRepository->findAll();
        return $this->render('front/index.html.twig', [
            'photos' => $photos,
        ]);
    }

    #[Route('/presentation', name: 'app_presentation')]
    public function presentation(): Response
    {
        return $this->render('front/presentation.html.twig', [
        ]);
    }

    // #[Route('/photo/{id}', name: 'app_display_photo')]
    // public function displayPhoto(Photo $photo): Response
    // {
    //     return $this->render('front/photo.html.twig', [
    //         'photo' => $photo
    //     ]);
    // }
}

