<?php

namespace App\Services;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Cart;
use App\Entity\CartDetails;
use App\Entity\Order;

class OrderServices{

    private $manager;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;

    }

    public function createOrder($cart)
    {
    }
    
    public function saveCart($data , $user)
    {
        $cart = new Cart();
        $reference = $this->generateUuid();
        $address = $data['checkout']['address'];
        $informations = $data['checkout']['informations'];
        $cart->setReference($reference)
            ->setFullName($address->getFullName())
            ->setDeliveryAddress($address)
            ->setMoreInformations($informations)
             ->setQuantity($data['data']['quantite_cart'])
             ->setSubTotalHT(($data['data']['subTotalHt']))
             ->setTaxe($data['data']['Taxe'])
             ->setSubTotalTTC(round(($data['data']['subTotalTTC'])))
            ->setUser($user)
            ->setCreatedAt(new \DateTime());
        
        $this->manager->persist($cart);
        
        $cart_detail_array = [];

        foreach($data['voyage'] as $voyages){

        $cartDetails = new cartDetails();

      

        $cartDetails->setCarts($cart)
                    ->setProductName($voyages['voyage']->getName())
                    ->setProductPrice($voyages['voyage']->getPrix()/100);
                    
                   

        }
        $this->manager->flush();

        return $reference; 
            
            
    }
    
    public function generateUuid()
    {
        mt_srand((double)microtime()*100000);

        $charid = strtoupper(md5(uniqid(rand(), true)));

        $hyphen = chr(45);

        $uuid = ""
        .substr($charid, 0,8).$hyphen
        .substr($charid, 8,4).$hyphen
        .substr($charid, 12,4).$hyphen
        .substr($charid, 16,4).$hyphen
        .substr($charid, 20,12);

        return $uuid;

    }

}