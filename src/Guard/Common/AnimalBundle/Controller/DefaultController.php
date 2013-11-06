<?php

namespace Guard\Common\AnimalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('GuardCommonAnimalBundle:Default:index.html.twig', array());
    }

    public function detailAction($id) {
        return $this->render('GuardCommonAnimalBundle:Default:index.html.twig', array());
    }

    public function newAction() {
        return $this->render('GuardCommonAnimalBundle:Default:index.html.twig', array());
    }

    public function updateAction() {
        return $this->render('GuardCommonAnimalBundle:Default:index.html.twig', array());
    }

    public function deleteAction() {
        return $this->render('GuardCommonAnimalBundle:Default:index.html.twig', array());
    }

}
