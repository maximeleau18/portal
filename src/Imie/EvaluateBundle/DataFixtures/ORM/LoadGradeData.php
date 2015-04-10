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
     */    public function load(ObjectManager $manager)
    {
    	$this->manager = $manager;
    	
    	// Make Grades
    	$grade01 = $this->makeGrade(18, "Très bien.", $this->getReference("test-01"));
    	$grade02 = $this->makeGrade(12, "Bien.", $this->getReference("test-01"));
    	$grade03 = $this->makeGrade(8, "Peu mieux faire.", $this->getReference("test-01"));
    	$grade04 = $this->makeGrade(5, "", $this->getReference("test-01"));
    	$grade05 = $this->makeGrade(15, "", $this->getReference("test-01"));
    	$grade06 = $this->makeGrade(11, "", $this->getReference("test-01"));
    	$grade07 = $this->makeGrade(12.5, "Bien.", $this->getReference("test-01"));
    	$grade08 = $this->makeGrade(18.5, "Très bon travail.", $this->getReference("test-01"));
    	$grade09 = $this->makeGrade(2, "Sujet non compris.", $this->getReference("test-01"));
    	$grade10 = $this->makeGrade(15.5, "Bien.", $this->getReference("test-01"));
    	$grade11 = $this->makeGrade(17.5, "Très bien.", $this->getReference("test-01"));
    	$grade12 = $this->makeGrade(10, "", $this->getReference("test-01"));
    	$grade13 = $this->makeGrade(8.5, "", $this->getReference("test-01"));
    	$grade14 = $this->makeGrade(7.5, "", $this->getReference("test-01"));
    	$grade15 = $this->makeGrade(19, "Presque parfait.", $this->getReference("test-01"));
    	
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