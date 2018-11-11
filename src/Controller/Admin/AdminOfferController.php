<?php

namespace App\Controller\Admin;


use App\Entity\Offer;
use App\Form\OfferType;
use App\Repository\OfferRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOfferController extends AbstractController

{
    /**
     * @var
     */
    private $repository;
    /**
     * @var
     */
    private $em;

    /**
     * AdminOfferController constructor.
     * @param OfferRepository $repository
     * @param ObjectManager $em
     */
    public function __construct(OfferRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @return Response
     */
    public function index()
    {
        $offers = $this->repository->findAll();

        return $this->render('admin/offer/index.html.twig', compact('offers'));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function new(Request $request)
    {

        $offer = new Offer();
        $form = $this->createForm(OfferType::class, $offer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($offer);
            $this->em->flush();
            $this->addFlash('success', 'Bien créé avec succès');
            return $this->redirectToRoute('admin');
        }

        return $this->render('admin/offer/new.html.twig', [
            'offer' => $offer,
            'form' => $form->createView()
        ]);


    }

    /**
     * @param Offer $offer
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function edit(Offer $offer, Request $request)
    {
        $form = $this->createForm(OfferType::class, $offer);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            $this->addFlash('success', 'Bien modifié avec succès');
            return $this->redirectToRoute('admin');
        }
        return $this->render('admin/offer/edit.html.twig', [
            'offer' => $offer,
            'form' => $form->createView()
        ]);
    }

    /**
     * @param Offer $offer
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Offer $offer, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $offer->getId(), $request->get('_token'))) {
            $this->em->remove($offer);
            $this->em->flush();
            $this->addFlash('success', 'Bien supprimé avec succès');
        }
        return $this->redirectToRoute('admin');

    }

}