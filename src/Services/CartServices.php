<?php
namespace App\Services;

use App\Repository\VoyagesRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartServices{

    private $session;
    private $repoVoyage;

    public function __construct(SessionInterface $session, VoyagesRepository $repoVoyage)
    {
        $this->session = $session;
        $this->repoVoyage = $repoVoyage;
    }

    public function addToCart($id){

        $cart = $this->getCart();

        if(isset($cart[$id])){
            // produit déja dans panier
            $cart[$id] ++;
        }else{
            // produit n'est pas dans panier
            $cart[$id] = 1;
        }
        $this->updatCart($cart);
    }

    public function deletFromCart($id){
        $cart = $this->getCart();

        if(isset($cart[$id])){
           
            if ($cart[$id] > 1) {

               $cart[$id]--;

            }else{
                unset($cart[$id]);
            }
            $this->updatCart($cart);
        }
    }

    public function deletAllToCart($id){
        $cart = $this->getCart();

        if(isset($cart[$id])){
 
            unset($cart[$id]);
            
            $this->updatCart($cart);
        }
    }

    public function deletCart(){
        $this->updatCart([]);
    }

    public function updatCart($cart){

        $this->session->set('cart',$cart);
        
    }

    public function getCart(){

      return  $this->session->get('cart',[]);
        
    }

    public function getFullCart(){
        $cart = $this->getCart();

        $fulCart=[];
        foreach ($cart as $id => $quantite) {
           $voyage= $this->repoVoyage->find($id);

           if ($voyage) {
               # voyage récupérer
                $fulCart[]=
                [
                    "quantite" => $quantite,
                    "voyage"=> $voyage
                ];
            }else{
                $this->deletFromCart($id);
            }
        }
          return $fulCart;
    }

    
    public function __toString() {
        $cart = $this->getCart();

        $fulCart=[];
        foreach ($cart as $id => $quantite) {
           $voyage= $this->repoVoyage->find($id);

           if ($voyage) {
               # voyage récupérer
                $fulCart[]=
                [
                    "quantite" => $quantite,
                    "voyage"=> $voyage
                ];
            }else{
                $this->deletFromCart($id);
            }
        }
        return $this->cart;
    }
}