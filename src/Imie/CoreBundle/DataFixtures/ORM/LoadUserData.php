<?php
/**************************************************************************
 * LoadUserData.php, IMIE core
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

class LoadUserData extends UserAbstractFicture
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        parent::load($manager);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 101;
    }
}