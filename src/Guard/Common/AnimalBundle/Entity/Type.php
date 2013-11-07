<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Guard\Common\AnimalBundle\Entity;

// On définit le namespace des annotations utilisées par Doctrine2
// En effet, il existe d'autres annotations, on le verra par la suite, qui utiliseront un autre namespace

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="TypeRepository")
 */
class Type {

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="img_path",type="string", length=255)
     */
    protected $imgPath;
    
    /**
     * @ORM\Column(name="nom", type="string", length=255)
     */
    protected $nom;

    /**
     * @ORM\OneToMany(targetEntity="Race", mappedBy="type")
     */
    protected $races;

    public function __construct() {
        $this->races = new ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getRaces() {
        return $this->races;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setRaces($races) {
        $this->races = $races;
    }
    
    public function getImgPath() {
        return $this->imgPath;
    }

    public function setImgPath($imgPath) {
        $this->imgPath = $imgPath;
    }

}
