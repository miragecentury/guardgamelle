<?php

namespace Guard\Common\AnimalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TypeController extends Controller {

    public function newAction() {
        return $this->render('GuardCommonAnimalBundle:Default:index.html.twig', array());
    }

    public function deleteAction() {
        return $this->render('GuardCommonAnimalBundle:Default:index.html.twig', array());
    }

}