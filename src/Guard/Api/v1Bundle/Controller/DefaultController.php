<?php

namespace Guard\Api\v1Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

class DefaultController extends Controller {

    public function indexAction() {
        if ($this->getRequest() == 'POST') {
            if (isJson($this->getRequest())){
                $id = $this->getRequest()->id;
                $state = $this->getRequest()->state;
                $date = $this->getRequest()->date;
                
                $validator = $this->get('validator');
                $errorList = $validator->validate($author);
                
                $this->get('logger')->info(id .','.state.','.date.'\n');
            }
        }
        
        return new Response("ok");
    }

    private function isJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

}
