<?php

namespace App\Controller;

use App\Entity\Destinations;
use App\Entity\Voyages;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DataLoaderController extends AbstractController
{
    /**
     * @Route("/data", name="data_loader")
     */
    public function index(EntityManagerInterface $manager): Response
    {
        $file_voyage =dirname(dirname(__DIR__))."/voyages.json";
        $file_destination =dirname(dirname(__DIR__))."/destination.json";
        $data_voyage= json_decode(file_get_contents($file_voyage))  ;
        $data_destination= json_decode(file_get_contents($file_destination)) ;
        //   dd($data_voyage);

            $destinations = [];

            foreach ($data_destination as $data_destination) 
            {
                $destination = new Destinations();
                $destination->setNomVille($data_destination[1])
                            ->setNomPays($data_destination[2]);
                    $manager->persist($destination);
                $destinations[]=$destination;
            }

            $voyages = [];

            foreach ($data_voyage as $data_voyage) 
            {
                $voyage = new Voyages();
                $voyage->setName($data_voyage[1])
                    ->setDescription($data_voyage[2])
                    ->setPrix($data_voyage[3])
                    ->setDuree($data_voyage[4])
                    ->setImage($data_voyage[5])
                    ->setIsSpecialOffert($data_voyage[6])
                    ->setQuantite($data_voyage[7])
                    ->setCreatedAt($data_voyage[8])
                    ->setTags($data_voyage[9])
                    ->setSlug($data_voyage[10]);
                $manager->persist($voyage);
                $voyages[]=$voyage;
            }

             $manager->flush();

         
        
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/DataLoaderController.php',
        ]);
    }
}
