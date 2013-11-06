<?php

namespace Guard\Common\AnimalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RaceController extends Controller {

    public function indexAction() {
        return $this->render('GuardCommonAnimalBundle:Default:index.html.twig', array());
    }

    public function newAction() {
        return $this->render('GuardCommonAnimalBundle:Default:index.html.twig', array());
    }

    public function deleteAction() {
        return $this->render('GuardCommonAnimalBundle:Default:index.html.twig', array());
    }

}
