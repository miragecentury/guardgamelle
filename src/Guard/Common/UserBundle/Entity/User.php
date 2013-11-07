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

    public function __construct() {
        parent::__construct();
        $this->animaux = ArrayCollection();
    }

}
