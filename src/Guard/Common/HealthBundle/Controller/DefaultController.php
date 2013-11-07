<?php

namespace Guard\Common\HealthBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GuardCommonHealthBundle:Default:index.html.twig', array('name' => $name));
    }
}
