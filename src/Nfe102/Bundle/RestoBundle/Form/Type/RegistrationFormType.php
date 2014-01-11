<?php

namespace Nfe102\Bundle\RestoBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('NomClient',null,array('label'=>'Nom'))
                ->add('PrenomClient',null,array('label'=>'Prenom'));
    }

    public function getName()
    {
        return 'nfe102_user_registration';
    }
}
?>