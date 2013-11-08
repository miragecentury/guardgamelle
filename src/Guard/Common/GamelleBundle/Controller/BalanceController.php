<?php

namespace Guard\Common\GamelleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Guard\Common\GamelleBundle\Entity\Balance;
use Guard\Common\GamelleBundle\Form\BalanceType;

class BalanceController extends Controller {

    public function indexAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $gamelles = $this->getDoctrine()->getManager()->getRepository('GuardCommonGamelleBundle:Balance')->findBy(array('user'=>$user->getId()));
        return $this->render('GuardCommonGamelleBundle:Balance:index.html.twig', array('gamelles' => $gamelles,'user'=>$user));
    }

    public function newAction() {
        $gamelle = new Balance();
        $form = $this->createForm(new BalanceType(), $gamelle);
        if ($this->getRequest()->isMethod('POST')) {
            $form->submit($this->getRequest());
            if ($form->isValid()) {
                $gamelle->setUser($this->container->get('security.context')->getToken()->getUser());
                $this->getDoctrine()->getManager()->persist($gamelle);
                $this->getDoctrine()->getManager()->flush();
                return $this->redirect($this->generateUrl('guard_common_balance_homepage'));
            }
        }
        return $this->render('GuardCommonGamelleBundle:Balance:new.html.twig', array('form' => $form->createView()));
    }

}
