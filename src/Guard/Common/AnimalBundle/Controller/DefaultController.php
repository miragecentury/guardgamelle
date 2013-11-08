<?php

namespace Guard\Common\AnimalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Guard\Common\AnimalBundle\Entity\Animal;
use Guard\Common\AnimalBundle\Form\AnimalType;

class DefaultController extends Controller {

    public function indexAction() {
        $animals = $this->container->get('security.context')->getToken()->getUser()->getAnimaux();
        return $this->render('GuardCommonAnimalBundle:Default:index.html.twig', array('animals' => $animals));
    }

    public function newselecttypeAction() {
        $repType = $this->getDoctrine()->getManager()->getRepository("GuardCommonAnimalBundle:Type");
        $types = $repType->findAll();
        return $this->render('GuardCommonAnimalBundle:Default:selecttype.html.twig', array('types' => $types));
    }

    public function newAction($id_type) {
        $animal = new Animal();
        $form = $this->createForm(new AnimalType($id_type), $animal);

        if ($this->getRequest()->isMethod("POST")) {
            $form->submit($this->getRequest());
            if ($form->isValid()) {
                $animal->setProprio($this->container->get('security.context')->getToken()->getUser());
                $this->getDoctrine()->getManager()->persist($animal);
                $this->getDoctrine()->getManager()->flush();
                $this->get('session')->getFlashBag()->add('animal', 'Compagnon bien ajouté');
                return $this->redirect($this->generateUrl('guard_common_animal_homepage', array()));
            }
        }
        return $this->render('GuardCommonAnimalBundle:Default:new.html.twig', array('form' => $form->createView()));
    }

    public function deleteAction($id) {
        return $this->render('GuardCommonAnimalBundle:Default:index.html.twig', array());
    }
    
    public function testChart($id){
        $Animal = $this->getDoctrine()->getManager()->getRepository("GuardCommonAnimalBundle:Animal")->find($id);
        if (is_a($Animal, "Animal") && ($Animal != null)) {
           $Gamelle = $Animal->getGamelle;
           $dt = new \DateTime('NOW');
           $EventGamelle = $this->getDoctrine()->getManager()->getRepository("GuardCommonEventGamelleBundle:EventGamelle")->findBy(array(
                'gamelle_id' => $Gamelle->id,
                'datetime' => function(EntityRepository $er) use ($dt){
                    $queryBuilder = $er->createQueryBuilder('d');
                    $queryBuilder->where('d >= '.$dt('d')-7);
                    return $queryBuilder;
                }
            ));
        }
    }

}

