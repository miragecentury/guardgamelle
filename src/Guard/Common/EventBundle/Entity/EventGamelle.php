<?php

namespace Guard\Common\EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Guard\Common\GamelleBundle\Entity\Gamelle;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Guard\Common\EventBundle\Entity\EventGamelleRepository")
 */
class EventGamelle {

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="datetime", type="datetime")
     */
    protected $datetime;
    
    /**
     * @ORM\Column(name="gamelle_id", type="integer")
     */
    protected $gamelle_id;

}
