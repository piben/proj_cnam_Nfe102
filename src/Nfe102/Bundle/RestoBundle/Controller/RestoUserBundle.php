<?php

// src/Nfe102/RestoBundle/RestoUserBundle.php


namespace RestoBundle\RestoUserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class RestoUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}

?>
