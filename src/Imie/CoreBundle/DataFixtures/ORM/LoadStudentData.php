<?php
/**************************************************************************
 * LoadStudentData.php, IMIE core
 *
 * Mickael Gaillard Copyright 2015
 * Description :
 * Author(s) : Mickael Gaillard <mickael.gaillard@tactfactory.com>
 * Licence : All right reserved.
 * Last update : Mar 6, 2015
 *
 **************************************************************************/
namespace Imie\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Imie\CoreBundle\Entity\Student;
use Sonata\UserBundle\Model\UserInterface;

class LoadStudentData extends UserAbstractFicture
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        parent::load($manager);

        $this->userManager->updateUser(
            $this->makeStudent(
                "Sandra",
                "b",
                "sandra.@tactfactoy.com",
                "toor",
                UserInterface::GENDER_MALE,
                "CDPN",
                "2015",
                array(),
                100), true);

    }

    /**
     * {@inheritDoc}
     */
    protected function makeStudent($firstname, $lastname, $email, $password, $gender, $promotion, $curriculum, $roles, $refUser)
    {
        $entity = $this->makeUser(new Student(), $firstname, $lastname, $email, $password, $gender, $roles, $refUser);
        $entity->setPromotion($promotion);
        $entity->setCurriculum($curriculum);

        return $entity;
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 200;
    }
}