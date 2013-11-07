<?php

namespace Guard\Common\GamelleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('GuardCommonGamelleBundle:Default:index.html.twig', array());
    }

    public function newAction() {
        return $this->render('GuardCommonGamelleBundle:Default:new.html.twig', array());
    }

}
