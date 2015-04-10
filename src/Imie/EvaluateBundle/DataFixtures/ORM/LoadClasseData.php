<?php
/**************************************************************************
 * LoadClasseData.php, IMIE evaluate
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

class LoadClasseData extends AbstractFixture implements OrderedFixtureInterface
{
	
	protected $manager;
	
    /**
     * (non-PHPdoc)
     * @see \Doctrine\Common\DataFixtures\FixtureInterface::load()
     */    public function load(ObjectManager $manager)
    {
    	$this->manager = $manager;
    	
    	// Make Classes
    	$classe01 = $this->makeClasse("Qualité Logicielle");
    	
    	$classe02 = $this->makeClasse("GIT");
    	$classe03 = $this->makeClasse("UML");
    	$classe04 = $this->makeClasse("SGBD");
    	$classe05 = $this->makeClasse("SQL");
    	$classe06 = $this->makeClasse("PHP5");
    	$classe07 = $this->makeClasse("Frameworks PHP");
    	$classe08 = $this->makeClasse("Tests Unitaires");
    	
    	$this->manager->persist($classe01);
    	$this->manager->persist($classe02);
    	$this->manager->persist($classe03);
    	$this->manager->persist($classe04);
    	$this->manager->persist($classe05);
    	$this->manager->persist($classe06);
    	$this->manager->persist($classe07);
    	$this->manager->persist($classe08);
    	
    	$this->manager->flush();
    	 
    	$this->setReference('classe-01', $classe01);
    	$this->setReference('classe-02', $classe02);
    	$this->setReference('classe-03', $classe03);
    	$this->setReference('classe-04', $classe04);
    	$this->setReference('classe-05', $classe05);
    	$this->setReference('classe-06', $classe06);
    	$this->setReference('classe-07', $classe07);
    	$this->setReference('classe-08', $classe08);
    }
    
    /**
     * Function create classe
     * 
     * @param string $libel
     * @param \Doctrine\Common\Collections\ArrayCollection(); $test
     * @return \Imie\EvaluateBundle\Entity\Classe
     */
    protected function makeClasse($libel)
    {
    	$classe = new Classe();
    	$classe->setLibel($libel);
    
    	return $classe;
    }

    /**
     * (non-PHPdoc)
     * @see \Doctrine\Common\DataFixtures\OrderedFixtureInterface::getOrder()
     */    public function getOrder()
    {
        return 1001;
    }
}