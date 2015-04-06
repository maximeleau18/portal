<?php
namespace Imie\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Faker\Factory;
use Doctrine\Common\Persistence\ObjectManager;
use Imie\CoreBundle\Entity\Student;

class LoadBaseData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    /**
     * The dependency injection container.
     * @var ContainerInterface
     */
    protected $container;

    protected $faker;

    protected $userManager;

    protected $manager;

    /**
     *
     * @see \Symfony\Component\DependencyInjection\ContainerAwareInterface::setContainer()
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
        $this->faker = Factory::create();
    }

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        $this->userManager = $this->container->get('fos_user.user_manager');

        // Make Students
        $student01 = $this->makeUser('Jean', 'Martelot', 'jeanmartelot@gmail.com', 'M', 'CDPN (M1)');
        $student02 = $this->makeUser('Quentin', 'Andrieu', 'quentinandrieumail@gmail.com', 'M', 'CDPN (M1)');
        $student03 = $this->makeUser('Luis', 'Alberto Pacheco', 'albertop182@gmail.com', 'M', 'CDPN (M1)');
        $student04 = $this->makeUser('Mickaël', 'Theraud', 'theraud.mickael@hotmail.fr', 'M', 'CDPN (M1)');
        $student05 = $this->makeUser('Christopher', 'Louët', 'christopher.louet@gmail.com', 'M', 'CDPN (M1)');
        $student06 = $this->makeUser('Axel', 'Avignon', 'a.avignon806@laposte.net', 'M', 'CDPN (M1)');
        $student07 = $this->makeUser('Anthony', 'Provini', 'provinianthony@gmail.com', 'M', 'CDPN (M1)');
        $student08 = $this->makeUser('Yoann', 'Bescher-Leblanc', 'y.bescher.leblanc@gmail.com', 'M', 'CDPN (M1)');
        $student09 = $this->makeUser('Clémence', 'Huvé', 'clemence.huve@gmail.com', 'F', 'CDPN (M1)');
        $student10 = $this->makeUser('Maxime', 'Lebastard', 'lebastardmaxime@gmail.com', 'M', 'CDPN (M1)');
        $student11 = $this->makeUser('Romain', 'Toma', 'romain.toma@bbox.fr', 'M', 'CDPN (M1)');
        $student12 = $this->makeUser('Damien', 'Le Pestipon', 'lepestipon.damien@gmail.com', 'M', 'CDPN (M1)');

        $this->manager->flush();
    }


    protected function makeUser($firstname, $lastname, $email, $gender, $promo)
    {
        $user = new Student();
        $user->setUsername($email);
        $user->setEnabled(true);
        $user->setPlainPassword('tooruser');
        $user->setFirstname($firstname);
        $user->setLastname($lastname);
        $user->setRoles(array());
        $user->setEmail($email);
        //         $user->setDateOfBirth($birthday);
        //         $user->setWebsite($website);
        $user->setGender($gender);
        $user->setLocale('fr_FR');
        //         $user->setTimezone($timeZone);
        //         $user->setPhone($phone);
        $user->setPromotion($promo);
        $user->addGroup($this->getReference('grp-student'));
        $this->userManager->updateUser($user, true);

        return $user;
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1000;
    }
}
