<?php
/**************************************************************************
 * LoadTestData.php, IMIE evaluate
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
use Imie\EvaluateBundle\Entity\Classe;
use Imie\EvaluateBundle\Entity\Test;
use Imie\EvaluateBundle\Entity\Grade;
use Imie\CoreBundle\Entity\Teacher;

class LoadTestData extends AbstractFixture implements OrderedFixtureInterface
{
	
	protected $manager;
	
    /**
     * (non-PHPdoc)
     * @see \Doctrine\Common\DataFixtures\FixtureInterface::load()
     */    public function load(ObjectManager $manager)
    {
    	$this->manager = $manager;
    	
    	// Make Tests    	
    	$test01 = $this->makeTest("Test de connaissances", 1.0, new \DateTime(), new \DateTime('+60 days'), $this->getReference("classe-01"));
    	
    	$this->manager->persist($test01);    	
    	$this->manager->flush();
    	
    	$this->setReference('test-01', $test01);
    }
    
    
    protected function makeTest($libel, $factor, $createdAt, $lockedAt, $classe, $teacher = null)
    {
    	$test = new Test();
    	$test->setLibel($libel);
    	$test->setFactor($factor);
    	$test->setCreatedAt($createdAt);
    	$test->setLockedAt($lockedAt);
    	$test->setClasse($classe);
    	$test->setTeacher($teacher);
 
      	return $test;
    }

    /**
     * (non-PHPdoc)
     * @see \Doctrine\Common\DataFixtures\OrderedFixtureInterface::getOrder()
     */    public function getOrder()
    {
        return 1002;
    }
}