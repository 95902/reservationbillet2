<?php
namespace App\Services;

use App\Entity\Order;
use App\Repository\VoyagesRepository;
use Doctrine\ORM\EntityManagerInterface;

class StockManagerServices{

    private $manager;
    private $repoProduct;

    public function __construct(EntityManagerInterface $manager, VoyagesRepository $repoVoyage)

    {
        $this->manager =$manager;
        $this->repoVoyage = $repoVoyage;
    }

    public function deStock(Order $order){

        $orderDetails = $order->getOrderDetails()->getValues();

        foreach($orderDetails as $key => $details){
            $voyage = $this->repoVoyage->findByName($details->getProductName())[0];
            $newQuantite = $voyage->getQuantite()- $details->getQuantite();
            $voyage->setQuantite($newQuantite);
            $this->manager->flush();
        }

    }
}