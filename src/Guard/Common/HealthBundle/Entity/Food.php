<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Guard\Common\FoodBundle\Entity;

// On définit le namespace des annotations utilisées par Doctrine2
// En effet, il existe d'autres annotations, on le verra par la suite, qui utiliseront un autre namespace
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Guard\Common\HealthBundle\Entity\FoodRepository")
 */
class Food {

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Race", inversedBy="foods")
     * @ORM\JoinColumn(name="race_id", referencedColumnName="id")
     */
    protected $race;
    
    /**
     * @ORM\Column(name="age", type="float")
     */
    protected $age;
    
    /**
     * @ORM\Column(name="poid_normal", type="float")
     */
    protected $poid_normal;
    
    /**
     * @ORM\Column(name="bilan_energetique_jour", type="integer")
     */
    protected $bilan_energetique_jour;
    
    /**
     * @ORM\Column(name="huile_soja_rt", type="float")
     */
    protected $huile_soja_rt;
    
    /**
     * @ORM\Column(name="haricot_vert_rt", type="float")
     */
    protected $haricot_vert_rt;
    
    /**
     * @ORM\Column(name="viande_hachee_rt", type="float")
     */
    protected $viande_hachee_rt;
    
    /**
     * @ORM\Column(name="feculent_rt", type="float")
     */
    protected $feculent_rt;
    
    /**
     * @ORM\Column(name="cmv", type="string", length="30")
     */
    protected $cmv;
    
    /**
     * @ORM\Column(name="rapport_prot_cal", type="float")
     */
    protected $rapport_prot_cal;
    
    /**
     * @ORM\Column(name="bee", type="float")
     */
    protected $bee;

    public function __construct() {
        
    }
    public function getId() {
        return $this->id;
    }

    public function getRace() {
        return $this->race;
    }

    public function getAge() {
        return $this->age;
    }

    public function getPoidNormal() {
        return $this->poid_normal;
    }

    public function getBilanEnergetiqueJour() {
        return $this->bilan_energetique_jour;
    }

    public function getHuileSojaRt() {
        return $this->huile_soja_rt;
    }

    public function getHaricotVertRt() {
        return $this->haricot_vert_rt;
    }

    public function getViandeHacheeRt() {
        return $this->viande_hachee_rt;
    }

    public function getFeculentRt() {
        return $this->feculent_rt;
    }

    public function getCmv() {
        return $this->cmv;
    }

    public function getRapportProtCal() {
        return $this->rapport_prot_cal;
    }

    public function getBee() {
        return $this->bee;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setRace($race) {
        $this->race = $race;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function setPoidNormal($poid_normal) {
        $this->poid_normal = $poid_normal;
    }

    public function setBilanEnergetiqueJour($bilan_energetique_jour) {
        $this->bilan_energetique_jour = $bilan_energetique_jour;
    }

    public function setHuileSojaRt($huile_soja_rt) {
        $this->huile_soja_rt = $huile_soja_rt;
    }

    public function setHaricotVertRt($haricot_vert_rt) {
        $this->haricot_vert_rt = $haricot_vert_rt;
    }

    public function setViandeHacheeRt($viande_hachee_rt) {
        $this->viande_hachee_rt = $viande_hachee_rt;
    }

    public function setFeculentRt($feculent_rt) {
        $this->feculent_rt = $feculent_rt;
    }

    public function setCmv($cmv) {
        $this->cmv = $cmv;
    }

    public function setRapportProtCal($rapport_prot_cal) {
        $this->rapport_prot_cal = $rapport_prot_cal;
    }

    public function setBee($bee) {
        $this->bee = $bee;
    }
}   
