<?php

namespace App\Controller\Stripe;

use App\Entity\Order;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StripeSuccessPaymentController extends AbstractController
{
    /**
     * @Route("/stripe-payment-success/{StripCheckoutSessionId}", name="stripe_payment_success")
     */
    public function index(Order $order): Response
    {

        dd($order);

        return $this->render('stripe/stripe_success_payment/index.html.twig', [
            'controller_name' => 'StripeSuccessPaymentController',
        ]);
    }
}
