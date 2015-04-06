<?php
/**************************************************************************
 * EntityBase.php, IMIE core
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
use \DateTime;

/**
 * EntityBase
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks()
 * @JSON\ExclusionPolicy("ALL")
 */
abstract class EntityBase
{

    /**
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
     * @ORM\Column(name="create_at", type="datetime")
     * @JSON\Expose
     * @JSON\Groups({"api_process"})
     * @JSON\Since("1.0")
     * @var \DateTime
     */
    private $createAt;

    /**
     * @ORM\Column(name="update_at", type="datetime", nullable = true)
     * @JSON\Expose
     * @JSON\Groups({"api_process"})
     * @JSON\Since("1.0")
     * @var \DateTime
     */
    private $updateAt;

    /**
     * Display string of object
     * @return string
     */
    public function __toString()
    {
        return strval($this->id);
    }

    /**
     * Hook on pre-persist operations
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->createAt = new \DateTime();
        $this->updateAt = new \DateTime();
    }

    /**
     * Hook on pre-update operations
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->updateAt = new \DateTime();
    }

    /**
     * Set id
     * @param integer $id
     *
     * @return EntityBase
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createAt
     * @param \DateTime $createAt
     *
     * @return EntityBase
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get createAt
     * @return \DateTime
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Set updateAt
     * @param \DateTime $updateAt
     *
     * @return EntityBase
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }
}
