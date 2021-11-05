<?php

namespace App\Controller;

use App\Repository\CarteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarteController extends AbstractController
{
    /**
     * @Route("/carte", name="carte")
     */
    public function index(CarteRepository $carteRepository): Response
    {
        return $this->render('carte/search.html.twig', [
            'carte' => $carteRepository->findAll(),

        ]);
    }
}
