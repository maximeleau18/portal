<?php

namespace Imie\CoreBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Imie\CoreBundle\Entity\Student;

class StudentAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('promotion')
            ->add('curriculum')
//             ->add('username')
//             ->add('usernameCanonical')
            ->add('email')
//             ->add('emailCanonical')
            ->add('enabled')
//             ->add('salt')
//             ->add('password')
//             ->add('lastLogin')
            ->add('locked')
            ->add('expired')
//             ->add('expiresAt')
//             ->add('confirmationToken')
//             ->add('passwordRequestedAt')
//             ->add('roles')
//             ->add('credentialsExpired')
//             ->add('credentialsExpireAt')
//             ->add('createdAt')
//             ->add('updatedAt')
            ->add('dateOfBirth')
            ->add('firstname')
            ->add('lastname')
            ->add('website')
            ->add('biography')
            ->add('gender')
            ->add('locale')
            ->add('timezone')
            ->add('phone')
            ->add('facebookUid')
            ->add('facebookName')
            ->add('facebookData')
            ->add('twitterUid')
            ->add('twitterName')
            ->add('twitterData')
            ->add('gplusUid')
            ->add('gplusName')
            ->add('gplusData')
            ->add('token')
            ->add('twoStepVerificationCode')
            ->add('id')

        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
//             ->add('username')
            ->addIdentifier('firstname')
            ->add('lastname')
            ->add('promotion')
            ->add('curriculum')
//             ->add('usernameCanonical')
//             ->add('email')
//             ->add('emailCanonical')
            ->add('enabled')
//             ->add('salt')
//             ->add('password')
            ->add('lastLogin')
            ->add('locked')
            ->add('expired')
            ->add('expiresAt')
//             ->add('confirmationToken')
//             ->add('passwordRequestedAt')
            ->add('roles')
            ->add('credentialsExpired')
            ->add('credentialsExpireAt')
            ->add('createdAt')
//             ->add('updatedAt')
            ->add('dateOfBirth')

//             ->add('website')
//             ->add('biography')
            ->add('gender')
//             ->add('locale')
//             ->add('timezone')
//             ->add('phone')
//             ->add('facebookUid')
//             ->add('facebookName')
//             ->add('facebookData')
//             ->add('twitterUid')
//             ->add('twitterName')
//             ->add('twitterData')
//             ->add('gplusUid')
//             ->add('gplusName')
//             ->add('gplusData')
//             ->add('token')
//             ->add('twoStepVerificationCode')
//             ->add('id')

            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('username')
            ->add('usernameCanonical')
            ->add('email')
            ->add('emailCanonical')
            ->add('enabled')
            ->add('salt')
            ->add('password')
            ->add('lastLogin')
            ->add('locked')
            ->add('expired')
            ->add('expiresAt')
            ->add('confirmationToken')
            ->add('passwordRequestedAt')
            ->add('roles')
            ->add('credentialsExpired')
            ->add('credentialsExpireAt')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('dateOfBirth')
            ->add('firstname')
            ->add('lastname')
            ->add('website')
            ->add('biography')
            ->add('gender')
            ->add('locale')
            ->add('timezone')
            ->add('phone')
            ->add('facebookUid')
            ->add('facebookName')
            ->add('facebookData')
            ->add('twitterUid')
            ->add('twitterName')
            ->add('twitterData')
            ->add('gplusUid')
            ->add('gplusName')
            ->add('gplusData')
            ->add('token')
            ->add('twoStepVerificationCode')
            ->add('id')
            ->add('promotion', 'choice', array( 'choices' => Student::PROMOTIONS))
            ->add('curriculum')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('username')
            ->add('usernameCanonical')
            ->add('email')
            ->add('emailCanonical')
            ->add('enabled')
            ->add('salt')
            ->add('password')
            ->add('lastLogin')
            ->add('locked')
            ->add('expired')
            ->add('expiresAt')
            ->add('confirmationToken')
            ->add('passwordRequestedAt')
            ->add('roles')
            ->add('credentialsExpired')
            ->add('credentialsExpireAt')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('dateOfBirth')
            ->add('firstname')
            ->add('lastname')
            ->add('website')
            ->add('biography')
            ->add('gender')
            ->add('locale')
            ->add('timezone')
            ->add('phone')
            ->add('facebookUid')
            ->add('facebookName')
            ->add('facebookData')
            ->add('twitterUid')
            ->add('twitterName')
            ->add('twitterData')
            ->add('gplusUid')
            ->add('gplusName')
            ->add('gplusData')
            ->add('token')
            ->add('twoStepVerificationCode')
            ->add('id')
            ->add('promotion')
            ->add('curriculum')
        ;
    }
}
