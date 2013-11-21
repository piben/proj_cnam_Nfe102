<?php

namespace Nfe102\Bundle\RestoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('Nfe102RestoBundle:Default:index.html.twig');
    }

    public function helloAction($name) {
        return $this->render('Nfe102RestoBundle:Default:hello.html.twig', array('name' => $name));
    }

}
