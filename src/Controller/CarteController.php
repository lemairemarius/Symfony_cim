<?php

namespace App\Controller;

use App\Entity\Carte;
use App\Entity\Gestionnaire;
use App\Entity\Utilisateurs;
use App\Form\UtilisateursType;
use App\Repository\CarteRepository;
use App\Repository\UtilisateursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Route;

/**
 * @Route ("/cartes")
 */

class CarteController extends AbstractController
{
    /**
     * @param CarteRepository $carteRepository
     * @return Response
     * @Route("/", name="cartes_index", methods={"GET"})
     */

    public function indexCarte(CarteRepository $carteRepository): Response
    {
        return $this->render('utilisateurs/index.html.twig', [
            'cartes' => $carteRepository->findAll(),
            dd($carteRepository)
        ]);
    }
}