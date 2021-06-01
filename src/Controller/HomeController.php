<?php

namespace App\Controller;

use App\Repository\VoyagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(VoyagesRepository $repoVoyage): Response
    {
        $voyages = $repoVoyage->findAll();
        $voyageOffreSpecial = $repoVoyage->findByIsSpecialOffert(1);
        // dd($voyages, $voyageOffreSpecial);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'voyages'=> $voyages,
            'voyageOffreSpecial' => $voyageOffreSpecial
        ]);
    }
}
