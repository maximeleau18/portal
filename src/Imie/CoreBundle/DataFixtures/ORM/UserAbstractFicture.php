<?php
namespace Imie\CoreBundle\DataFixtures\ORM;

use Imie\CoreBundle\DataFixtures\ORM\MainAbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

abstract class UserAbstractFicture extends MainAbstractFixture
{

    protected $userManager;

    public function load(ObjectManager $manager)
    {
        $this->userManager = $this->container->get('fos_user.user_manager');
    }

    protected function makeUser($user, $firstname, $lastname, $email, $password, $gender, $roles, $refUser, $refGroup = "grp-student")
    {
        $user->setUsername($email);
        $user->setEnabled(true);
        $user->setPlainPassword($password);
        $user->setFirstname($firstname);
        $user->setLastname($lastname);
        $user->setRoles($roles);
        $user->setEmail($email);
        //         $user->setDateOfBirth($birthday);
        //         $user->setWebsite($website);
        $user->setGender($gender);
        $user->setLocale('fr_FR');
        //         $user->setTimezone($timeZone);
        //         $user->setPhone($phone);
        $user->addGroup($this->getReference($refGroup));
        $this->addReference('ref-user-'.$refUser, $user);

        return $user;
    }
}