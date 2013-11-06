<?php

namespace Guard\Common\PublicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GuardCommonPublicBundle:Default:index.html.twig');
    }
}
