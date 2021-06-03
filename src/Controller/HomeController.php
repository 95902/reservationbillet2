<?php

namespace App\Controller;

use App\Entity\AgenceLocationVoitures;
use App\Entity\SearchVoyage;
use App\Entity\Voyages;
use App\Form\SearchVoyageType;
use App\Repository\AgenceLocationVoituresRepository;
use App\Repository\DestinationsRepository;
use App\Repository\HotelsRepository;
use App\Repository\VolsRepository;
use App\Repository\VoyagesRepository;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(VoyagesRepository $repoVoyage, Request $request): Response
    {
        $voyages = $repoVoyage->findAll();
     
        $search = new SearchVoyage();
        $form = $this->createForm(SearchVoyageType::class, $search);
        //  dd($voyages, $voyageOffreSpecial);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() ) {
            $voyages = $repoVoyage->findWithSearch($search);
            
            return $this->render('home/voyage.html.twig', ['voyages'=> $voyages ]);
        }


        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'search'=>$form->createView(),
            'voyages'=> $voyages,
    
            
        ]);
    }

    
     

    /**
    * @Route("/voyage/{slug}",name="voyage_details")
    */
    public function show(?Voyages $voyage,HotelsRepository $reposhotels,DestinationsRepository $reposdestination,AgenceLocationVoituresRepository $reposelocation): Response{

        $id_voyage = $voyage->getId();
        $hotels = $reposhotels->findAll();
        $destinations=$reposdestination->findAll();
        $locationVoitureAgence = $reposelocation->findAll();
      
        //   dd($reposelocation);  

        if (!$voyage) {
            return $this->redirectToRoute("home");
        }
        return $this->render("home/single_voyage.html.twig",[
            'voyage'=>$voyage,
            'hotels'=>$hotels,
            'destinations'=> $destinations,
            'agenceLocationVoiture'=>$locationVoitureAgence,
            
        ]);    
    }

}
