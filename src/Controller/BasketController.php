<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Photo;
use App\Repository\PhotoRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class BasketController extends AbstractController
{
    #[Route('/basket', name: 'app_basket')]
    public function index(SessionInterface $session): Response
    {

        $basket = $session->get('basket', []);

        return $this->render('basket/index.html.twig', [
            'basket' => $basket,
        ]);
    }

    #[Route('/photo/{id}', name: 'basket_add')]
    public function addToBasket(Photo $photo, SessionInterface $session): Response
    {
        $basket = $session->get('basket', []);

        if (!isset($basket[$photo])) {
            $cart[$photo] = 0;
        }
        $cart[$photo]++;
    
        $session->set('basket', $basket);

        return $this->redirectToRoute('app_basket');


}

}
