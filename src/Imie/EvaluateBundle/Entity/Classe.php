<?php
/**************************************************************************
 * Classe.php, IMIE evalute
 *
 * Maxime Léau Copyright 2015
 * Description :
 * Author(s) : Maxime Léau <maxime.leau@imie-rennes.fr>
 * Licence : All right reserved.
 * Last update : April 6, 2015
 *
 **************************************************************************/
namespace Imie\EvaluateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/** 
 * Classe entity
 * @ORM\Entity
 * @ORM\Table(name="classe")
 * @ORM\Entity(repositoryClass="Imie\EvaluateBundle\Repository\ClasseRepository")
 */
class Classe
{
	/**
	 * Classe ID
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var integer
	 */
	protected $id;
	
	/**
	 * Classe Libel
	 * @ORM\Column(type="string", length=255)
	 * @var string
	 */
	protected $libel;	
		
	/**
	 * Classe Tests Collection
	 * @ORM\OneToMany(targetEntity="Imie\EvaluateBundle\Entity\Test", mappedBy="test", cascade={"persist"})
	 * @var \Doctrine\Common\Collections\Collection
	 */
	protected $tests;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tests = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set libel
     *
     * @param string $libel
     * @return Classe
     */
    public function setLibel($libel)
    {
        $this->libel = $libel;

        return $this;
    }

    /**
     * Get libel
     *
     * @return string 
     */
    public function getLibel()
    {
        return $this->libel;
    }

    /**
     * Add tests
     *
     * @param \Imie\EvaluateBundle\Entity\Test $tests
     * @return Classe
     */
    public function addTest(\Imie\EvaluateBundle\Entity\Test $tests)
    {
        $this->tests[] = $tests;

        return $this;
    }

    /**
     * Remove tests
     *
     * @param \Imie\EvaluateBundle\Entity\Test $tests
     */
    public function removeTest(\Imie\EvaluateBundle\Entity\Test $tests)
    {
        $this->tests->removeElement($tests);
    }

    /**
     * Get tests
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTests()
    {
        return $this->tests;
    }
}
