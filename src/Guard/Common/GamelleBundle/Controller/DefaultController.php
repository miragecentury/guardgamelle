<?php

namespace Guard\Common\GamelleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GuardCommonGamelleBundle:Default:index.html.twig', array('name' => $name));
    }
}
