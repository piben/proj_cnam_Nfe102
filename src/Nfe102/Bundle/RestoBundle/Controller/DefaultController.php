<?php

namespace Nfe102\Bundle\RestoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
// On utilise l'object session de symfony
use Symfony\Component\HttpFoundation\Session\Session;
//use Symfony\Component\Security\Core\SecurityContext;

class DefaultController extends Controller {
    

    public function indexAction($menu) {

    //   $this->killSessionAction();
        $this->sessionCart();
//$this->killSessionAction();
//if(!$session->has('panier'))
//{
//   $session->set('panier' => array('numprod' => array(), 'qte' => array()));
//}
//$panier = $session->get('panier');
//array_push($panier['numprod'], $id);
//array_push($panier['qte'],$qte);
        
        if(!isset($menu)){    
            $menu = 1;
        } 

        return $this->render('Nfe102RestoBundle:Default:index.html.twig', array('menu' => $menu));
    }

    public function helloAction($name) {
        return $this->render('Nfe102RestoBundle:Default:hello.html.twig', array('name' => $name));
    }

    public function sessionCart() {
       
    //   $loggeduser =  $this->container->get('security.context')->getToken()->getRoles();;
       
       //var_dump($loggeduser);
        // On crée la session
       if (!$this->container->get('session')->isStarted()){
        $session = new Session();
        $session->start();
 
// définit et récupère des attributs de session
      //  $cart = $session->get('cart', array());
        
     //   $cart["78787"] = 2;
     //   $cart["78799"] = 1;
        
      //  $session->set('cart', $cart);
        
   }   else {
          $session = $this->get('request')->getSession();    
   }
// définit des messages dits « flash »
 //  $name = $session->get('cart');
 //       $session->getFlashBag()->add('notice', 'Ajouter au panier');

//        $cart = $session->get('cart');
//$cart[rand()] = 1;
//$session->set('cart',$cart);
        
       // var_dump($loggeduser);
// récupère des messages
//        foreach ($session->getFlashBag()->get('notice', array()) as $message) {
//         //   var_dump($name);
//            echo "<div class='flash-notice'>$message      </div>";
//        }
    }
    
//    private function setarticle($session,$id,$value) {
//        $session->set($id, $value);
//    }

    public function killSessionAction() {
     
        var_dump($this->container->get('session')->hasPreviousSession());

        if ($this->container->get('session')->isStarted()) {
         //   echo "kill";die();
            $this->get('security.context')->setToken(null);
            $this->get('request')->getSession()->clear();
            $this->get('request')->getSession()->invalidate();
        }
    }
    
 
}
