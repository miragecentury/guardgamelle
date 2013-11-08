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
                $dateNow = new \DateTime('NOW');
                if (count($errorIdList) != 0 || count($errorDateList) != 0 || count($errorStateList) != 0 || $d->setTimestamp($request->date) > $dateNow) {
                    return new response("{err:'check request failed'}", 500);
                }

                $eventGamelle = new EventGamelle();
                $Gamelle = $this->getDoctrine()->getManager()->getRepository("GuardCommonGamelleBundle:Gamelle")->findOneBy(array('uid' => $request->id));
                if ($Gamelle != null && $Gamelle->getAnimal() != null) {
                    $eventGamelle->setAnimalId($Gamelle->getAnimal()->getId());
                    $eventGamelle->setDatetime((new \DateTime())->setTimestamp($request->date));
                    $eventGamelle->setState($request->state);
                    $this->getDoctrine()->getManager('google')->persist($eventGamelle);
                    $this->getDoctrine()->getManager('google')->flush();
                    return new Response("{ok:'ok'}", 200);
                } else {
                    return new Response("{err:'Gamelle n'existe pas'}", 500);
                }
            } else {
                return new Response("{err:'json parce err'}", 500);
            }
        } else {
            return new Response("{err:'no post'}", 500);
        }
    }

    private function isJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

}
