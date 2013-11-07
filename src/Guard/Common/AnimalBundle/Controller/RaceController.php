<?php

namespace Guard\Common\AnimalBundle\Controller;

use Guard\Common\AnimalBundle\Form\RaceType;
use Guard\Common\AnimalBundle\Entity\Race;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RaceController extends Controller {

    public function indexAction() {
        $repType = $this->getDoctrine()->getManager()->getRepository("GuardCommonAnimalBundle:Type");
        $types = $repType->findAll();
        return $this->render('GuardCommonAnimalBundle:Race:index.html.twig', array('types' => $types));
    }

    public function newAction() {
        $race = new Race();
        $form = $this->createForm(new RaceType(), $race);
        if ($this->getRequest()->isMethod("POST")) {
            $form->submit($this->getRequest());
            if ($form->isValid()) {
                $this->getDoctrine()->getManager()->persist($race);
                $this->getDoctrine()->getManager()->flush();
                $this->get('session')->getFlashBag()->add('race', 'Race bien ajouté');
                return $this->redirect($this->generateUrl('guard_common_animal_race', array()));
            }
        }
        return $this->render('GuardCommonAnimalBundle:Race:add.html.twig', array('form' => $form->createView()));
    }

    public function deleteAction() {
        return $this->render('GuardCommonAnimalBundle:Default:index.html.twig', array());
    }

}
