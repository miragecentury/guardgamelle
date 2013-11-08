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
     * @ORM\Column(name="animal_id", type="integer")
     */
    protected $animal_id;

    /**
     * @ORM\Column(name="state", type="float")
     */
    protected $state;

    public function getId() {
        return $this->id;
    }

    public function getDatetime() {
        return $this->datetime;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDatetime($datetime) {
        $this->datetime = $datetime;
    }

    public function getState() {
        return $this->state;
    }

    public function setState($state) {
        $this->state = $state;
    }

    public function getAnimalId() {
        return $this->animal_id;
    }

    public function setAnimalId($animal_id) {
        $this->animal_id = $animal_id;
    }

}
