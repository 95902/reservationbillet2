<?php

namespace App\Controller;

use App\Form\CheckoutType;
use App\Services\CartServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckoutController extends AbstractController
{
    /**
    * @Route("/checkout", name="checkout")
    */
    public function index(CartServices $cartServices,Request $request): Response
    {
            $user = $this->getUser();
            $cart = $cartServices->getFullCart();  

        if(!$cart){  
            return $this->redirectToRoute('home');
        }
        //  if($user->getAddresses()->getValues()){
        //     $this->addFlash('validation message', 'ajouter une addresse a votre compte' );
        //     return $this->redirectToRoute('address_new');
        // }
        $form = $this->createForm(CheckoutType::class,null,['user'=>$user]);

        $form->handleRequest($request);

       

        return $this->render('checkout/index.html.twig', [
            'cart'=>$cart,
            'checkout'=>$form->createView()
        ]);
    }
}
