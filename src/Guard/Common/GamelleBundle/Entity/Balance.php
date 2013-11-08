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
use Guard\Common\EventBundle\Entity\EventBalance;
use Guard\Common\AnimalBundle\Entity\Animal;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Guard\Common\GamelleBundle\Entity\BalanceRepository")
 */
class Balance {

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
     * @ORM\ManyToOne(targetEntity="Guard\Common\UserBundle\Entity\User", inversedBy="balances")
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

    public function getAnimal() {
        return $this->animal;
    }

    public function getUser() {
        return $this->user;
    }

    public function setAnimal($animal) {
        $this->animal = $animal;
    }

    public function setUser($user) {
        $this->user = $user;
    }

}
