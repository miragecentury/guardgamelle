<?php

// src/Sdz/UserBundle/Entity/User.php

namespace Guard\Common\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Guard\Common\AnimalBundle\Entity\Animal", mappedBy="proprio")
     */
    protected $animaux;

    /**
     * @ORM\OneToMany(targetEntity="Guard\Common\GamelleBundle\Entity\Gamelle", mappedBy="user")
     */
    protected $gamelles;
    
    /**
     * @ORM\OneToMany(targetEntity="Guard\Common\GamelleBundle\Entity\Balance", mappedBy="user")
     */
    protected $balances;

    public function __construct() {
        parent::__construct();
        $this->animaux = ArrayCollection();
        $this->gamelles = ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    public function getAnimaux() {
        return $this->animaux;
    }

    public function getGamelles() {
        return $this->gamelles;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setAnimaux($animaux) {
        $this->animaux = $animaux;
    }

    public function setGamelles($gamelles) {
        $this->gamelles = $gamelles;
    }

    public function getBalances() {
        return $this->balances;
    }

    public function setBalances($balances) {
        $this->balances = $balances;
    }

}
