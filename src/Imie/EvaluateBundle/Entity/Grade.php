<?php
/**************************************************************************
 * Grade.php, IMIE evalute
 *
 * Maxime Léau Copyright 2015
 * Description :
 * Author(s) : Maxime Léau <maxime.leau@imie-rennes.fr>
 * Licence : All right reserved.
 * Last update : April 6, 2015
 *
 **************************************************************************/
namespace Imie\EvaluateBundle\Entity;

use Imie\CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\Event\LifecycleEventArgs;

/**
 * Grade entity
 * @ORM\Entity
 * @ORM\Table(name="grade")
 * @ORM\Entity(repositoryClass="Imie\EvaluateBundle\Repository\GradeRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Grade
{
	/**
	 * Grade ID
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var integer
	 */
	protected $id;
	
	/**
	 * Grade Value
	 * @ORM\Column(type="decimal")
	 * @var decimal
	 */
	protected $value;
	
	/**
	 * Grade Comment
	 * @ORM\Column(type="text", nullable=true)
	 * @var text
	 */
	protected $comment;
	
	/**
	 * Grade Test
	 * @ORM\ManyToOne(targetEntity="Imie\EvaluateBundle\Entity\Test", inversedBy="grades")
	 * @ORM\JoinColumn(name="test_id", referencedColumnName="id")
	 * @var \Imie\EvaluateBundle\Entity\Test
	 */
	protected $test;
	
	/**
	 * Grade Student
	 * @ORM\ManyToOne(targetEntity="Imie\CoreBundle\Entity\Student", inversedBy="grades")
	 * @ORM\JoinColumn(name="student_id", referencedColumnName="id") 
	 * @var \Imie\CoreBundle\Entity\Student
	 */
	protected $student;

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
     * Set value
     *
     * @param string $value
     * @return Grade
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set test
     *
     * @param \Imie\EvaluateBundle\Entity\Test $test
     * @return Grade
     */
    public function setTest(\Imie\EvaluateBundle\Entity\Test $test = null)
    {
        $this->test = $test;

        return $this;
    }

    /**
     * Get test
     *
     * @return \Imie\EvaluateBundle\Entity\Test 
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * Set student
     *
     * @param \Imie\CoreBundle\Entity\Student $student
     * @return Grade
     */
    public function setStudent(\Imie\CoreBundle\Entity\Student $student = null)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return \Imie\CoreBundle\Entity\Student 
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Grade
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }
    
    /**
     * @ORM\PostPersist()
     */
    public function updateTestGradesAverage() 
    {
    	
    }
    
    /**
     * @ORM\PostPersist
     */
    public function updateTestMaxGrade(LifecycleEventArgs  $args)
    {   	 
    	if (!$this->test){
    		$grades = $this->test->getGrades();
    		
    		if (!$grades){
	    		foreach ($grades as $value) {
	    			$maxGrade = 0;
	    			
	    			if ($value->value > $maxGrade){
		    				$maxGrade = $value->value;
		    			}
	    		} ($grades);
    		}
    		
    		
    	 	$this->test->setMaxGrade($maxGrade);
    	 	$em = $this->getDoctrine()->getEntityManager();
    	 	$test = $em->find(\Imie\EvaluateBundle\Entity\Test, $this->getTest()->getId());
        	$em->persist($test);
        	$em->flush();
    	}
    }
    
    /**
     * @ORM\PostPersist()
     */
    public function updateTestMinGrade()
    {
    	 
    }
}
