<?php

namespace Guard\Api\v1Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Upsert;
use Guard\Common\GamelleBundle\Entity\Gamelle;
use Guard\Common\EventBundle\Entity\EventGamelle;

class DefaultController extends Controller {

    public function indexAction() {
        if ($this->getRequest()->isMethod("POST")) {
            if ($this->isJson($this->getRequest()->getContent())) {
                $idConstraint = new Upsert\Length(array(
                    'min' => 36,
                    'max' => 36
                ));
                $dateConstraint = new Upsert\DateTime();
                $stateConstraint = new Upsert\Range(array(
                    'min' => 0,
                ));
                $d = new \DateTime();
                $request = json_decode($this->getRequest()->getContent());
                $errorIdList = $this->get('validator')->validateValue($request->id, $idConstraint);
                $errorDateList = $this->get('validator')->validateValue($d->setTimestamp($request->date), $dateConstraint);
                $errorStateList = $this->get('validator')->validateValue($request->state, $stateConstraint);
                if (count($errorIdList) != 0 || count($errorDateList) != 0 || count($errorStateList) != 0 || $d->setTimestamp($request->date) > new \DateTime('NOW')) {
                    return new response("", 500); 
                }

                $eventGamelle = new EventGamelle();
                $Gamelle = $this->getDoctrine()->getManager()->getRepository("GuardCommonGamelleBundle:Gamelle")->findOneBy(array('uid' => $request->id));
                $eventGamelle->setId($Gamelle->id);
                $eventGamelle->setDatetime((new \DateTime())->setTimestamp($request->date));
                $this->getDoctrine()->getManager()->persist($Gamelle);
                $this->getDoctrine()->getManager()->flush();

                return new Response("", 200);
            } else {
                return new Response("", 500);
            }
        } else {
            return new Response("", 500);
        }
    }

    private function isJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

}
