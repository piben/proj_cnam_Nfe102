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
            /*->add('dispo','choice', array('choices'   => array('1000000' => 'lundi', '0100000' => 'mardi',
                    '0010000' => 'mercredi','0001000' => 'jeudi','0000100' => 'vendredi','0000010' => 'samedi',
                    '0000001' => 'dimanche','1111111'=>'tous les jours'),
                    'required'  => false,'multiple'=>true,))*/
            //->add('datecreateprod')
            //->add('dateupdateprod')
            //->add('idpanier')
            ->add('idcathegorie')
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
