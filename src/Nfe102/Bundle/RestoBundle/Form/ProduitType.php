<?php

namespace Nfe102\Bundle\RestoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProduitType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nom', 'text', array('required' => true))
                ->add('description', 'textarea', array('required' => true))
                ->add('image')
                ->add('prix', 'money', array('required' => true))
                ->add('dispo', 'choice', array(
                    'choices' => array(
                        '1' => 'Lundi',
                        '2' => 'Mardi',
                        '3' => 'Mercredi',
                        '4' => 'Jeudi',
                        '5' => 'Samedi',
                        '6' => 'Dimanche',                       
                    ),
                    'expanded' => true, 'multiple' => true
                ))
                //    ->add('datecreateprod')
                //    ->add('dateupdateprod')
                //    ->add('idpanier')
                ->add('idcategorie', null, array('label' => "Categorie"))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Nfe102\Bundle\RestoBundle\Entity\Produit'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'nfe102_bundle_restobundle_produit';
    }

}
