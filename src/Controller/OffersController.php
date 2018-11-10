<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class OffersController extends AbstractController
{
    /**
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('offers/index.html.twig', [
            'current_menu' => 'offers']);
    }

}