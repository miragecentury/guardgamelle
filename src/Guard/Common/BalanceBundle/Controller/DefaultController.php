<?php

namespace Guard\Common\BalanceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GuardCommonBalanceBundle:Default:index.html.twig', array('name' => $name));
    }
}
