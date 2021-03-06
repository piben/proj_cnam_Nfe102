<?php

namespace Nfe102\Bundle\RestoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AdresseType extends AbstractType
{
    /*private $idclient;
    
    function __construct($idclient) {
        
        $this->idclient = $idclient;
    }*/
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
            ->add('adresse1')
            ->add('adresse2')
            ->add('typeadresse')
            //->add('datecreateadresse')
            //->add('dateupdateadresse')
            //->add('idclient','hidden',array('data'=>$this->idclient))
          //  ->add('idcodepostal',null,array('label'=>'code postal'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Nfe102\Bundle\RestoBundle\Entity\Adresse'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'nfe102_bundle_restobundle_adresse';
    }
}
