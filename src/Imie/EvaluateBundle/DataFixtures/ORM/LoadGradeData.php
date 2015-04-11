<?php
/**************************************************************************
 * LoadGradeData.php, IMIE evaluate
 *
 * Maxime Léau Copyright 2015
 * Description :
 * Author(s) : Maxime Léau <maxime.leau@imie-rennes.fr>
 * Licence : All right reserved.
 * Last update : April 10, 2015
 *
 **************************************************************************/
namespace Imie\EvaluateBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Imie\CoreBundle\Entity\Student;
use Imie\EvaluateBundle\Entity\Test;
use Imie\EvaluateBundle\Entity\Grade;

class LoadGradeData extends AbstractFixture implements OrderedFixtureInterface
{
	
	protected $manager;
	
    /**
     * (non-PHPdoc)
     * @see \Doctrine\Common\DataFixtures\FixtureInterface::load()
     */    
     public function load(ObjectManager $manager)
    {
    	
    	$this->manager = $manager;
    	
    	// Make Grades
    	$grade01 = $this->makeGrade(floatval(18.0), "Très bien.", $this->getReference("test-01"));
    	$grade02 = $this->makeGrade(floatval(12.0), "Bien.", $this->getReference("test-01"));
    	$grade03 = $this->makeGrade(floatval(8.0), "Peu mieux faire.", $this->getReference("test-01"));
    	$grade04 = $this->makeGrade(floatval(11.0), "", $this->getReference("test-01"));
    	$grade05 = $this->makeGrade(floatval(15.0), "", $this->getReference("test-01"));
    	$grade06 = $this->makeGrade(floatval(11.0), "", $this->getReference("test-01"));
    	$grade07 = $this->makeGrade(floatval(12.5), "Bien.", $this->getReference("test-01"));
    	$grade08 = $this->makeGrade(floatval(18.5), "Très bon travail.", $this->getReference("test-01"));
    	$grade09 = $this->makeGrade(floatval(2.0), "Sujet non compris.", $this->getReference("test-01"));
    	$grade10 = $this->makeGrade(floatval(15.5), "Bien.", $this->getReference("test-01"));
    	$grade11 = $this->makeGrade(floatval(17.5), "Très bien.", $this->getReference("test-01"));
    	$grade12 = $this->makeGrade(floatval(10.0), "", $this->getReference("test-01"));
    	$grade13 = $this->makeGrade(floatval(8.5), "", $this->getReference("test-01"));
    	$grade14 = $this->makeGrade(floatval(1.25), "", $this->getReference("test-01"));
    	$grade15 = $this->makeGrade(floatval(19.0), "Presque parfait.", $this->getReference("test-01"));
    	
    	$this->manager->persist($grade01);
    	$this->manager->persist($grade02);
    	$this->manager->persist($grade03);
    	$this->manager->persist($grade04);
    	$this->manager->persist($grade05);
    	$this->manager->persist($grade06);
    	$this->manager->persist($grade07);
    	$this->manager->persist($grade08);
    	$this->manager->persist($grade09);
    	$this->manager->persist($grade10);
    	$this->manager->persist($grade11);
    	$this->manager->persist($grade12);
    	$this->manager->persist($grade13);
    	$this->manager->persist($grade14);
    	$this->manager->persist($grade15);
    	    	
    	$test01 = $this->getReference("test-01");
    	/**if ($test01 instanceof Test){
    		$test01->addGrade($grade01);
    		$test01->addGrade($grade02);
    		$test01->addGrade($grade03);
    		$test01->addGrade($grade04);
    		$test01->addGrade($grade05);
    		$test01->addGrade($grade06);
    		$test01->addGrade($grade07);
    		$test01->addGrade($grade08);
    		$test01->addGrade($grade09);
    		$test01->addGrade($grade10);
    		$test01->addGrade($grade11);
    		$test01->addGrade($grade12);
    		$test01->addGrade($grade13);
    		$test01->addGrade($grade14);
    		$test01->addGrade($grade15);
    	}**/
    	$gradesCol = new \Doctrine\Common\Collections\ArrayCollection(array($grade01, $grade02, $grade03, $grade04, $grade05, $grade06, $grade07, $grade08, $grade09, $grade10, $grade11, $grade12, $grade13, $grade14, $grade15));
    	$maxGrade = $gradesCol->first()->getValue();
    	$minGrade = $gradesCol->first()->getValue();
    	$gradesAvg = 0;
    	foreach ($gradesCol as $g){
    		if ($g){
	    		$gradesAvg += $g->getvalue();
	    		if ($g->getValue() > $maxGrade){
	    			$maxGrade = $g->getValue();
	    		}
	    		if ($g->getValue() < $minGrade){
	    			$minGrade = $g->getValue();
	    		}
    		}
    	}
    	$test01->setMaxGrade($maxGrade);
    	$test01->setMinGrade($minGrade);
    	if($gradesCol->count() <> 0){
    		$test01->setGradesAverage(floatval($gradesAvg) / $gradesCol->count());
    	}
    	$this->manager->persist($test01);
    	
    	$this->manager->flush();
    }
    
       
    protected function makeGrade($value, $comment, $test, $student = null)
    {
    	$grade = new Grade();
    	$grade->setValue($value);
    	$grade->setTest($test);
    	$grade->setComment($comment);
    	$grade->setStudent($student);
    	    
    	return $grade;
    }

    /**
     * (non-PHPdoc)
     * @see \Doctrine\Common\DataFixtures\OrderedFixtureInterface::getOrder()
     */    public function getOrder()
    {
        return 1003;
    }
}