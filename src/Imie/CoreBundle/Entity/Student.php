<?php
/**************************************************************************
 * Student.php, IMIE core
 *
 * Mickael Gaillard Copyright 2015
 * Description :
 * Author(s) : Mickael Gaillard <mickael.gaillard@tactfactory.com>
 * Licence : All right reserved.
 * Last update : Mar 6, 2015
 *
 **************************************************************************/
namespace Imie\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JSON;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Student entity
 * @ORM\Table(name="pi_student")
 * @ORM\Entity(repositoryClass="Imie\CoreBundle\Repository\StudentRepository")
 * @JSON\ExclusionPolicy("ALL")
 */
class Student extends User
{
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $groups;

    /**
     * Promotion ID.
     * @ORM\Column(type="string")
     * @JSON\Expose
     * @JSON\Groups({"api_process"})
     * @JSON\Since("1.0")
     * @var string
     */
    protected $promotion;

    /**
     * Academic curricula.
     * @ORM\Column(type="string")
     * @JSON\Expose
     * @JSON\Groups({"api_process"})
     * @JSON\Since("1.0")
     * @var string
     */
    protected $curriculum;

    /**
     * IT START - général - Bac +1
       DL - dev - Bac +2
    CDPN - dev - Bac +3 et Bac +4 - L3 et M1
    CPCSI - général - Bac +5 - M2
    RISR - réseau - Bac +3 et Bac +4 - L3 et M1
     */

    const PROMOTIONS = array (
        '' => null,
        'IT START (L1)' => 'IT START (L1)',
        'DL (L2)' => 'DL (L2)',
        'CDPN (L3)' => 'CDPN (L3)',
        'CDPN (M1)' => 'CDPN (M1)',
        'CPCSI (M2)' => 'CPCSI (M2)',
        'RISR (L3)' => 'RISR (L3)',
        'RISR (M1)' => 'RISR (M1)'
    );

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set promotion
     *
     * @param string $promotion
     * @return Student
     */
    public function setPromotion($promotion)
    {
        $this->promotion = $promotion;

        return $this;
    }

    /**
     * Get promotion
     *
     * @return string
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * Set curriculum
     *
     * @param string $curriculum
     * @return Student
     */
    public function setCurriculum($curriculum)
    {
        $this->curriculum = $curriculum;

        return $this;
    }

    /**
     * Get curriculum
     *
     * @return string
     */
    public function getCurriculum()
    {
        return $this->curriculum;
    }

    /**
     * Add groups
     *
     * @param \Imie\CoreBundle\Entity\Group $groups
     * @return Student
     */
    public function addGroup(\FOS\UserBundle\Model\GroupInterface $groups)
    {
        $this->groups[] = $groups;

        return $this;
    }

    /**
     * Remove groups
     *
     * @param \Imie\CoreBundle\Entity\Group $groups
     */
    public function removeGroup(\FOS\UserBundle\Model\GroupInterface $groups)
    {
        $this->groups->removeElement($groups);
    }

    /**
     * Get groups
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroups()
    {
        return $this->groups;
    }
}
