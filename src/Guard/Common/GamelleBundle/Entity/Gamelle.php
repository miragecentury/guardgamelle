<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Guard\Common\GamelleBundle\Entity;

// On définit le namespace des annotations utilisées par Doctrine2
// En effet, il existe d'autres annotations, on le verra par la suite, qui utiliseront un autre namespace
use Doctrine\ORM\Mapping as ORM;
use Guard\Common\UserBundle\Entity\User;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Guard\Common\AnimalBundle\Entity\GamelleRepository")
 */
class Gamelle {

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="uid", type="string", unique=true, length=36)
     */
    protected $uid;

    /**
     * @ORM\Column(name="label", type="string", length=255)
     */
    protected $label;

    /**
     * @ORM\OneToOne(targetEntity="Guard\Common\AnimalBundle\Entity\Animal")
     * @ORM\JoinColumn(name="animal_id", referencedColumnName="id")
     */
    protected $animal;

    /**
     * @ORM\ManyToOne(targetEntity="Guard\Common\UserBundle\Entity\User", inversedBy="gamelles")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    public function getId() {
        return $this->id;
    }

    public function getUid() {
        return $this->uid;
    }

    public function getLabel() {
        return $this->label;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUid($uid) {
        $this->uid = $uid;
    }

    public function setLabel($label) {
        $this->label = $label;
    }

}
