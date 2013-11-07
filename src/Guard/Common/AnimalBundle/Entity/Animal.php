<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Guard\Common\AnimalBundle\Entity;

// On définit le namespace des annotations utilisées par Doctrine2
// En effet, il existe d'autres annotations, on le verra par la suite, qui utiliseront un autre namespace
use Doctrine\ORM\Mapping as ORM;
use Guard\Common\UserBundle\Entity\User;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Guard\Common\AnimalBundle\Entity\AnimalRepository")
 */
class Animal {

    const SEXE_MALE = 0;
    const SEXE_FEMALE = 1;

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="nom", type="string", length=255)
     */
    protected $nom;

    /**
     * @ORM\Column(name="sexe", type="integer")
     */
    protected $sexe;

    /**
     * @ORM\Column(name="date_naissance", type="date")
     */
    protected $date_naissance;
    
    /**
     * @ORM\ManyToOne(targetEntity="Race", inversedBy="animaux")
     * @ORM\JoinColumn(name="race_id", referencedColumnName="id")
     */
    protected $race;
    
    /**
     * @ORM\ManyToOne(targetEntity="Guard\Common\UserBundle\Entity\User", inversedBy="animaux")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $proprio;

    public function __construct() {
        
    }

}
