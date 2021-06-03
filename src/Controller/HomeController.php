<?php

namespace App\Controller;

use App\Entity\Voyages;
use App\Repository\DestinationsRepository;
use App\Repository\HotelsRepository;
use App\Repository\VolsRepository;
use App\Repository\VoyagesRepository;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(VoyagesRepository $repoVoyage, VolsRepository $repovols,HotelsRepository $reposhotels): Response
    {
        $voyages = $repoVoyage->findAll();
        $voyageOffreSpecial = $repoVoyage->findByIsSpecialOffert(1);
        $vols = $repovols->findAll();
        $hotels = $reposhotels->findAll();
        //  dd($voyages, $voyageOffreSpecial);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'voyages'=> $voyages,
            'voyageOffreSpecial' => $voyageOffreSpecial,
            'vols'=>$vols,
            'hotels'=>$hotels,
            'reposhotel'=> $reposhotels,
        ]);
    }

    
     

    /**
    * @Route("/voyage/{slug}",name="voyage_details")
    */
    public function show(?Voyages $voyage,HotelsRepository $reposhotels,DestinationsRepository $reposdestination): Response{

        $id_voyage = $voyage->getId();
        $hotels = $reposhotels->findAll();
        $destinations=$reposdestination->findAll();
        
      
        //   dd($hotel, $id_voyage,$hotels,$voyage );  

        if (!$voyage) {
            return $this->redirectToRoute("home");
        }
        return $this->render("home/single_voyage.html.twig",[
            'voyage'=>$voyage,
            'hotels'=>$hotels,
            'destinations'=> $destinations,
            
        ]);    
    }

}
