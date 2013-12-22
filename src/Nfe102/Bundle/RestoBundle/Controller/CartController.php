<?php

namespace Nfe102\Bundle\RestoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
// On utilise l'object session de symfony
use Symfony\Component\HttpFoundation\Session\Session;
// Objet response
use Symfony\Component\HttpFoundation\Response;
// Objet request
use Symfony\Component\HttpFoundation\Request;

//use Symfony\Component\Security\Core\SecurityContext;

class CartController extends Controller {

    public function addToCartAction(Request $request) {

        if ($request->isXmlHttpRequest()) {

            $idprod = $request->get('idprod');

            $session = $this->container->get('session');
            $cart = $session->get('cart');

            if (array_key_exists($idprod, $cart)) {
                $cart[$idprod]++;
            }
            else {
                if ($idprod != "") {
                    $cart[$idprod] = 1;
                }
            }
            if ($session->get('cart') != $cart) {
                $session->set('cart', $cart);
            }
            return new Response("Add OK", 200);
        }
    }

    public function removeFromCartAction(Request $request) {
        if ($request->isXmlHttpRequest()) {
            $idprod = $request->get('idprod');
            $session = $this->container->get('session');
            $cart = $session->get('cart');

            if (array_key_exists($idprod, $cart)) {

                if ($cart[$idprod] > 1) {
                    $cart[$idprod]--;
                }
                else {
                    unset($cart[$idprod]);
                }
                $session->set('cart', $cart);
            }
            return new Response("dell OK", 200);
        }
    }

    public function basketAction(Request $idprod) {
        if ($request->isXmlHttpRequest()) {
            $session = $this->container->get('session');
            $cart = $session->get('cart');

            if (isset($cart[$idprod])) {
                unset($cart[$idprod]);

                $session->set('cart', $cart);
            }
        }
    }

    public function shootcartAction() {

        $session = $this->get('request')->getSession();
        $session->set('cart', array());
        return $this->redirect($this->generateUrl('nfe102_resto_homepage'));
    }

    public function showCartAction() {

        $session = $this->container->get('session');
        $cart = $session->get('cart');
        return new Response(json_encode($cart), 200);
    }

}

?>
