<?php

namespace Guard\Common\GamelleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Guard\Common\GamelleBundle\Entity\Gamelle;
use Guard\Common\GamelleBundle\Form\GamelleType;

class DefaultController extends Controller {

    public function indexAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $gamelles = $this->getDoctrine()->getManager()->getRepository('GuardCommonGamelleBundle:Gamelle')->findBy(array('user'=>$user->getId()));
        return $this->render('GuardCommonGamelleBundle:Default:index.html.twig', array('gamelles' => $gamelles,'user'=>$user));
    }

    public function newAction() {
        $gamelle = new Gamelle();
        $form = $this->createForm(new GamelleType(), $gamelle);
        if ($this->getRequest()->isMethod('POST')) {
            $form->submit($this->getRequest());
            if ($form->isValid()) {
                $gamelle->setUser($this->container->get('security.context')->getToken()->getUser());
                $this->getDoctrine()->getManager()->persist($gamelle);
                $this->getDoctrine()->getManager()->flush();
                return $this->redirect($this->generateUrl('guard_common_gamelle_homepage'));
            }
        }
        return $this->render('GuardCommonGamelleBundle:Default:new.html.twig', array('form' => $form->createView()));
    }

}
