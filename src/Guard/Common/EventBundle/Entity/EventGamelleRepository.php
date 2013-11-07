<?php

namespace Guard\Common\GamelleBundle\Entity;

use Doctrine\ORM\EntityRepository;

class EventRepository extends EntityRepository {
    public function getGamelle(){
        $this->getEntityManager();
    }
}
