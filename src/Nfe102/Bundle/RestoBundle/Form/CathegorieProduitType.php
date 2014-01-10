<?php

namespace Nfe102\Bundle\RestoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CathegorieProduitType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type')
            ->add('datecreatecat')
            ->add('dateupdatecat')
          //  ->add('idproduit')
        ;
    }
  
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Nfe102\Bundle\RestoBundle\Entity\CathegorieProduit'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'nfe102_bundle_restobundle_cathegorieproduit';
    }
}
