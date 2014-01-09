<?php

namespace Nfe102\Bundle\RestoBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('roles', 'choice', array(
			'choices' => array('ROLE_USER' => 'Utilisateur', 'ROLE_ADMIN' => 'Admin'),
                            'multiple'=>true
            ));
    }

    public function getName()
    {
        return 'nfe102_user_registration';
    }
}
?>