<?php

namespace Guard\Common\AnimalBundle\Controller;

use DateTime;
use Doctrine\ORM\EntityRepository;
use Guard\Common\AnimalBundle\Entity\Animal;
use Guard\Common\AnimalBundle\Form\AnimalType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;

class DefaultController extends Controller {

    public function indexAction() {
        $animals = $this->container->get('security.context')->getToken()->getUser()->getAnimaux();
        $formb = $this->createFormBuilder();
        $formb->add('gamelle', 'entity', array(
            'class' => 'GuardCommonGamelleBundle:Gamelle',
            'property' => 'label',
            'query_builder' => function(EntityRepository $er) {
        $queryBuilder = $er->createQueryBuilder('a');
        $queryBuilder->where('a.animal is null');
        return $queryBuilder;
    }
        ));
        $formb->add('animal');
        $form = $formb->getForm();

        $inputsAnimalsg = array();
        foreach ($animals as $animal) {
            $inputsAnimalsg[$animal->getId()] = $this->getDoctrine()->getManager('google')->getRepository("GuardCommonEventBundle:EventGamelle")->findBy(array('animal_id' => $animal->getId()));
        }

        return $this->render('GuardCommonAnimalBundle:Default:index.html.twig', array('animals' => $animals, 'form' => $form->createView(), 'inputsAnimalsg' => $inputsAnimalsg));
    }

    public function newselecttypeAction() {
        $repType = $this->getDoctrine()->getManager()->getRepository("GuardCommonAnimalBundle:Type");
        $types = $repType->findAll();
        $animals = $this->container->get('security.context')->getToken()->getUser()->getAnimaux();
        return $this->render('GuardCommonAnimalBundle:Default:selecttype.html.twig', array('types' => $types, 'animals' => $animals));
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

    public function testChart($id) {
        $Animal = $this->getDoctrine()->getManager()->getRepository("GuardCommonAnimalBundle:Animal")->find($id);
        if (is_a($Animal, "Animal") && ($Animal != null)) {
            $Gamelle = $Animal->getGamelle;
            $dt = new DateTime('NOW');
            $EventGamelle = $this->getDoctrine()->getManager()->getRepository("GuardCommonEventGamelleBundle:EventGamelle")->findBy(array(
                'gamelle_id' => $Gamelle->id,
                'datetime' => function(EntityRepository $er) use ($dt) {
            $queryBuilder = $er->createQueryBuilder('d');
            $queryBuilder->where('d >= ' . $dt('d') - 7);
            return $queryBuilder;
        }
            ));
        }
    }

    public function linkAction() {
        $formb = $this->createFormBuilder();
        $formb->add('gamelle', 'entity', array(
            'class' => 'GuardCommonGamelleBundle:Gamelle',
            'property' => 'label',
            'query_builder' => function(EntityRepository $er) {
        $queryBuilder = $er->createQueryBuilder('a');
        $queryBuilder->where('a.animal is null');
        return $queryBuilder;
    }
        ))->add('animal');
        $form = $formb->getForm();
        if ($this->getRequest()->isMethod('POST')) {
            $form->submit($this->getRequest());
            if ($form->isValid()) {
                $datas = $form->getData();
                $Animal = $this->getDoctrine()->getManager()->getRepository("GuardCommonAnimalBundle:Animal")->find($datas['animal']);
                $Gamelle = $datas['gamelle'];
                if ($Animal != null && $Gamelle != null) {
                    $Animal->setGamelle($Gamelle);
                    $Gamelle->setAnimal($Animal);
                    $this->getDoctrine()->getManager()->flush();
                    return $this->redirect($this->generateUrl('guard_common_animal_homepage'));
                }
            }
        }
        return new \Symfony\Component\HttpFoundation\Response();
    }

    public function unlinkAction($id) {
        $Gamelle = $this->getDoctrine()->getManager()->getRepository('GuardCommonGamelleBundle:Gamelle')->find($id);
        $Animal = $Gamelle->getAnimal();
        $Animal->setGamelle(null);
        $Gamelle->setAnimal(null);
        $this->getDoctrine()->getManager()->flush();
        $this->get('session')->getFlashBag()->add('link', 'Link supprimé');
        return $this->redirect($this->generateUrl('guard_common_animal_homepage'));
    }

}
