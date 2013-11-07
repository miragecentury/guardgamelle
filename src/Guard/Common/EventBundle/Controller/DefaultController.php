<?php

namespace Guard\Common\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GuardCommonEventBundle:Default:index.html.twig', array('name' => $name));
    }
}
