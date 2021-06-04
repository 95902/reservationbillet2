<?php

namespace App\Controller\Stripe;

use App\Entity\Cart;
use App\Services\CartServices;
use App\Services\OrderServices;
use Doctrine\ORM\EntityManagerInterface;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Service\OrderService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StripeCheckoutSessionController extends AbstractController
{
    /**
    * @Route("/create-checkout-session/{reference}", name="create_checkout_session")
    */
    public function index(Cart $cart,OrderServices $orderService,EntityManagerInterface $manager): Response
    {
      $user= $this->getUser();
        if(!$cart){
          return $this->redirectToRoute('home');
        }
       

        $order = $orderService->createOrder($cart);

        Stripe::setApiKey('sk_test_51IyZcCCOJraNtFKTyoKJ3hfnloHVDB6CqUwszdU22ICqBxMmAo60KUNrbBkJ8xjWyrC5H4BL0JECm7OZ7BqDYr2m00jsBGqVnm');

         
        $checkout_session = Session::create([
            'customer_email'=>$user->getEmail(),
            'payment_method_types' => ['card'],
            'line_items' => $orderService->getLineItems($cart),
            'mode' => 'payment',
            'success_url' => $_ENV['YOUR_DOMAIN'].'/stripe-payment-success/{CHECKOUT_SESSION_ID}',
            'cancel_url' => $_ENV['YOUR_DOMAIN'].'/stripe-payment-cancel/{CHECKOUT_SESSION_ID}',

            ]);


            $order->setStripCheckoutSessionID($checkout_session->id);
            $manager->flush();

          
        return $this->json(['id'=> $checkout_session->id]);
    }
}
