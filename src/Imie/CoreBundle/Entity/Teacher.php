<?php
/**************************************************************************
 * Teacher.php, IMIE core
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
 * @ORM\Table(name="pi_teacher")
 * @ORM\Entity(repositoryClass="Imie\CoreBundle\Repository\TeacherRepository")
 * @JSON\ExclusionPolicy("ALL")
 */
class Teacher extends User
{
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $groups;

    /**
     * @ORM\Column(type="boolean", nullable = true)
     * @JSON\Expose
     * @JSON\Groups({"api_process"})
     * @JSON\Since("1.0")
     * @var boolean
     */
    protected $busy;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set busy
     *
     * @param boolean $busy
     * @return Teacher
     */
    public function setBusy($busy)
    {
        $this->busy = $busy;

        return $this;
    }

    /**
     * Get busy
     *
     * @return boolean
     */
    public function getBusy()
    {
        return $this->busy;
    }

    /**
     * Add groups
     *
     * @param \Imie\CoreBundle\Entity\Group $groups
     * @return Teacher
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
