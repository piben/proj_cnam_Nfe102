<?php

namespace Nfe102\Bundle\RestoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProduitType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('descrition')
            ->add('image')
            ->add('prix')
            ->add('dispo')
        //    ->add('datecreateprod')
        //    ->add('dateupdateprod')
        //    ->add('idpanier')
            ->add( 'idcathegorie', null ,array('label' =>"Cathegorie"))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Nfe102\Bundle\RestoBundle\Entity\Produit'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'nfe102_bundle_restobundle_produit';
    }
}
