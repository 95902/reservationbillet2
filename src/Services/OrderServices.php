<?php

namespace App\Services;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Cart;
use App\Entity\CartDetails;
use App\Entity\Order;
use App\Entity\OrderDetails;
use App\Repository\VoyagesRepository;

class OrderServices{

    private $manager;
    private $repoVoyage;

    public function __construct(EntityManagerInterface $manager,VoyagesRepository $repoVoyage)
    {
        $this->manager = $manager;
        $this->repoVoyage = $repoVoyage;
    }

    public function createOrder($cart)
    {
        
        $order = new Order();
        $order->setReference($cart->getReference())
              ->setFullName($cart->getFullName())
              ->setDeliveryAddress($cart->getDeliveryAddress())
              ->setMoreInformations($cart->getMoreInformations())
              ->setQuantity($cart->getQuantity())
              ->setSubtotalHT($cart->getSubTotalHT())
              ->setTaxe($cart->getTaxe())
              ->setSubtotalTTC($cart->getSubTotalTTC())
              ->setUser($cart->getUser())
              ->setCreatedAt($cart->getCreatedAt());
        $this->manager->persist($order);

        $voyages = $cart->getCartDetails()->getValues();

        foreach ($voyages as $cart_voyage) {
            $orderDetails = new OrderDetails();
            $orderDetails->setOrders($order)
                         ->setProductName($cart_voyage->getProductName())
                         ->setProductPrice($cart_voyage->getProductPrice())
                         ->setQuantity($cart_voyage->getQuantity())
                         ->setSubTotalHT($cart_voyage->getSubTotalHT())
                         ->setSubTotalTTC($cart_voyage->getSubTotalTTC())
                         ->setTaxe($cart_voyage->getTaxe());
            $this->manager->persist($orderDetails);
        }

        $this->manager->flush();

        return $order;
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

    public function getLineItems($cart){
        $cartDetails = $cart->getCartDetails();

        $line_items = [];
        foreach ($cartDetails as $details) {
            $voyage = $this->repoVoyage->findOneByName($details->getProductName());
            
            $line_items[] = [
                'price_data' => [
                  'currency' => 'usd',
                  'unit_amount' => $voyage->getPrice(),
                  'product_data' => [
                    'name' => $voyage->getName(),
                    'images' => [$_ENV['YOUR_DOMAIN'].'/uploads/voyages/'.$voyage->getImage()],
                  ],
                ],
                'quantity' =>  $details->getQuantity(),
            ];
        }
        // Taxe
        $line_items[] = [
            'price_data' => [
              'currency' => 'usd',
              'unit_amount' => $cart->getTaxe()*100,
              'product_data' => [
                'name' => 'TVA (20%)',
                'images' => [$_ENV['YOUR_DOMAIN'].'/uploads/voyages/'],
              ],
            ],
            'quantity' =>  1,
        ];
        

        return $line_items;
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