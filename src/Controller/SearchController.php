<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Form\VolsType;
use App\Repository\VolsRepository;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function searchVol( Request $request, VolsRepository $volsRepository)
    {
        $searchVolForm = $this->createForm(VolsType::class);
        if($searchVolForm->handleRequest($request)->isSubmitted() && $searchVolForm->isValid()){
            $criteria = $searchVolForm->getData();
            dd($criteria);
            $vols = $volsRepository->searchVol($critere);
        }
        return $this->render('search/index.html.twig', [
            'search_form' => $searchVolForm->createView(),
        ]);
    }
}
