<?php
/**************************************************************************
 * LoadGroupData.php, IMIE core
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
use Imie\CoreBundle\Entity\Group;
use Imie\CoreBundle\Entity\User;

class LoadGroupData extends MainAbstractFixture
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $group = new Group("Admin", array( User::ROLE_DEFAULT, User::ROLE_API, User::ROLE_SUPER_ADMIN ));
        $manager->persist($group);
        $manager->flush();
        $this->setReference("grp-admin", $group);

        $group = new Group("Student", array( User::ROLE_DEFAULT, User::ROLE_API ));
        $manager->persist($group);
        $manager->flush();
        $this->setReference("grp-student", $group);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 100;
    }
}