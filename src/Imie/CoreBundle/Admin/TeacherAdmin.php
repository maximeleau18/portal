<?php

namespace Imie\CoreBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class TeacherAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('username')
            ->add('firstname')
            ->add('lastname')
//             ->add('usernameCanonical')
            ->add('email')
//             ->add('emailCanonical')
            ->add('enabled')
//             ->add('salt')
//             ->add('password')
            ->add('lastLogin')
            ->add('locked')
            ->add('expired')
            ->add('expiresAt')
//             ->add('confirmationToken')
            ->add('passwordRequestedAt')
//             ->add('roles')
            ->add('credentialsExpired')
            ->add('credentialsExpireAt')
            ->add('createdAt')
            ->add('updatedAt')
//             ->add('dateOfBirth')

            ->add('website')
//             ->add('biography')
            ->add('gender')
            ->add('locale')
            ->add('timezone')
            ->add('phone')
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
            ->add('id')
            ->add('busy')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
//             ->add('id')
//             ->addIdentifier('username')
            ->addIdentifier('firstname')
            ->add('lastname')
//             ->add('usernameCanonical')
//             ->add('email')
//             ->add('emailCanonical')
            ->add('roles')
            ->add('busy')
            ->add('enabled')
//             ->add('salt')
//             ->add('password')
            ->add('locked')
            ->add('expired')
//             ->add('expiresAt')
//             ->add('confirmationToken')
//             ->add('passwordRequestedAt')
//             ->add('credentialsExpired')
//             ->add('credentialsExpireAt')
//             ->add('dateOfBirth')
//             ->add('website')
//             ->add('biography')
//             ->add('gender')
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
            ->add('createdAt')
//             ->add('updatedAt')
            ->add('lastLogin')
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
            ->add('busy')
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
            ->add('busy')
        ;
    }
}
