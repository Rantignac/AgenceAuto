<?php

namespace App\Controller;


use App\Entity\Offer;
use App\Repository\OfferRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class OfferController extends AbstractController
{

    /**
     * @var OfferRepository
     */

    private $repository;

    /**
     * @var
     */
    private $em;

    public function __construct(OfferRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em   = $em;
    }

    /**
     * @return Response
     */
    public function index(): Response
    {


        return $this->render('offer/index.html.twig', [
            'current_menu' => 'offers']);
    }

    /**
     * @return Response
     */
    public function show(Offer $offer , string $slug):Response
    {
      if ($offer->getSlug() !== $slug){
        return $this->redirectToRoute('offer.show',[
             'id' => $offer->getId(),
             'slug' => $offer->getSlug()
         ],301);
      }
        return $this->render('offer/show.html.twig', [
            'offer' => $offer,
            'current_menu' => 'offers']);
    }

}