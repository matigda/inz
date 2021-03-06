<?php

namespace Inz\ReportsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CauldronType extends AbstractType
{   
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array(
                'label' => 'cauldron.name'
            ))
            ->add('cauldronType','entity', array(
                'label' => 'cauldron.type',
                'class' => 'Inz\ReportsBundle\Entity\CauldronType'
            ))
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Inz\ReportsBundle\Entity\Cauldron'
        ));
    }

    public function getName()
    {
        return 'inz_reportsbundle_cauldron';
    }
}
