<?php
namespace App\Services;


use App\Repository\VoyagesRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;



class CartServices{

    private $session;
    private $repoVoyage;
    private $tva = 0.2;

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

        $this->session->set('cartData', $this->getFullCart());
        
    }

    public function getCart(){

      return  $this->session->get('cart',[]);
        
    }

    public function getFullCart(){
        $cart = $this->getCart();

        $fulCart=[];
        $quantite_cart = 0;
        $subTotal =0;
        foreach ($cart as $id => $quantite) {
           $voyage= $this->repoVoyage->find($id);

           if ($voyage) {
               # voyage récupérer

            if($quantite > $voyage->getQuantite())
            {
               $quantite = $voyage->getQuantite(); 
               $cart[$id] = $quantite;
               $this->updatCart($cart);
            }
                $fulCart['voyage'][]=
                [
                    "quantite" => $quantite,
                    "voyage"=> $voyage,
                ];
                $quantite_cart += $quantite;
                $subTotal +=$quantite * $voyage->getPrix()/100;
            }else{
                $this->deletFromCart($id);
            }
        }
        $fulCart['data']=[
            "quantite_cart" => $quantite_cart,
            "subTotalHt"=> $subTotal,
            "Taxe" => round($subTotal*$this->tva,2), 
            "subTotalTTC"=> round(($subTotal + ($subTotal * $this->tva)), 2)
        ];
          return $fulCart;
    }


}