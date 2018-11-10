<?php

namespace App\Controller;


use App\Repository\OfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    public function index(OfferRepository $repository)
    {

        $offers = $repository->findLastest();
        return $this->render('pages/home.html.twig', [
            'offers' => $offers
        ]);

    }

}