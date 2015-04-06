<?php
/**************************************************************************
 * User.php, IMIE core
 *
 * Mickael Gaillard Copyright 2015
 * Description :
 * Author(s) : Mickael Gaillard <mickael.gaillard@tactfactory.com>
 * Licence : All right reserved.
 * Last update : Mar 6, 2015
 *
 **************************************************************************/
namespace Imie\CoreBundle\Entity;

use Sonata\UserBundle\Entity\BaseUser as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JSON;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\GroupInterface;
use FOS\UserBundle\Model\UserInterface;

/**
 * User entity
 * @ORM\Table(name="sys_user")
 * @ORM\Entity(repositoryClass="Imie\CoreBundle\Repository\UserRepository")
 * @ORM\MappedSuperclass
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap( {"user" = "User", "teacher" = "Teacher", "student" = "Student"} )
 * @ORM\HasLifecycleCallbacks()
 * @JSON\ExclusionPolicy("ALL")
 */
class User extends BaseUser
{

    const ROLE_API = 'ROLE_API';

    /**
     * Technical ID.
     * @ORM\Id
     * @ORM\Column(type="bigint")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @JSON\Expose
     * @JSON\Groups({"api_process"})
     * @JSON\Since("1.0")
     * @var integer
     */
    protected $id;

    /**
    * @ORM\ManyToMany(targetEntity="Imie\CoreBundle\Entity\Group")
    * @ORM\JoinTable(name="sys_group_user",
    *   joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
    *   inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
    * )
    * @var \Doctrine\Common\Collections\Collection
    */
    protected $groups;

    /**
     * Display string of object
     * @return string
     */
    public function __toString()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function isStudent()
    {
        $res = (get_class($this) == Student::class);

        return $res;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add groups
     *
     * @param \Imie\CoreBundle\Entity\Group $groups
     * @return User
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
