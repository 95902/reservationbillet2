<?php

namespace App\Controller\Cart;

use App\Form\CheckoutType;
use App\Services\CartServices;
use App\Services\OrderServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CheckoutController extends AbstractController
{
    private $cartServices;
    private $session;

    public function __construct(CartServices $cartServices, SessionInterface $session)
    {
        $this->cartServices = $cartServices;
        $this->session = $session;
    }
    /**
    * @Route("/checkout", name="checkout")
    */
    public function index(Request $request, SessionInterface $session): Response
    {
            $user = $this->getUser();
            $cart = $this->cartServices->getFullCart();  

        if(!$cart){  
            return $this->redirectToRoute('home');
        }
        //  if($user->getAddresses()->getValues()){
        //     $this->addFlash('validation message', 'ajouter une addresse a votre compte' );
        //     return $this->redirectToRoute('address_new');
        // }

        if($this->session->get('checkout_data')){
            return $this->redirectToRoute('checkout_confirm');
        }
        $form = $this->createForm(CheckoutType::class,null,['user'=>$user]);

        $form->handleRequest($request);

       

        return $this->render('checkout/index.html.twig', [
            'cart'=>$cart,
            'checkout'=>$form->createView()
        ]);
    }
     /**
    * @Route("/checkout/confirm", name="checkout_confirm")
    */

    public function confirm(Request $request, OrderServices $orderServices): Response
    {
        $user = $this->getUser();
        $cart= $this->cartServices->getFullCart();

        if(!$cart){  
            return $this->redirectToRoute('home');
        }

        $form = $this->createForm(CheckoutType::class,null,['user'=>$user]);

        $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid() || $this->session->get('checkout_data')){

        if($this->session->get('checkout_data')){
            $data = $this->session->get('checkout_data');
        }else{
            $data = $form->getData();
            $this->session->set('checkout_data', $data);
        }
        
        $address = $data['address'];
        $information = $data['informations'];

         //save panier(cart)
        $cart['checkout'] = $data;
        $reference= $orderServices->saveCart($cart, $user);
        // dd($reference);


        return $this->render('checkout/confirm.html.twig',[
            'cart'=> $cart,
            'address' => $address,
            'informations' => $information,
            'reference'=> $reference,
            'checkout' => $form->createView()
        ]);
      }
        return $this->redirectToRoute('checkout');
    }

     /**
    * @Route("/checkout/edit", name="checkout_edit")
    */
    public function checkoutEdit(): Response
    {
        $this->session->set('checkout_data',[]);
        return $this->redirectToRoute('checkout');
    }

}