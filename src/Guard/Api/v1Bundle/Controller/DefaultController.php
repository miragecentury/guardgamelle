<?php

namespace Guard\Api\v1Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GuardApiv1Bundle:Default:index.html.twig', array('name' => $name));
    }
}
