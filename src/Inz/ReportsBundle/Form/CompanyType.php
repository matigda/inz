<?php

namespace Inz\ReportsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CompanyType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array(
                'label' => 'company.name'
            ))
            ->add('adress', null, array(
                'label' => 'company.adress'
            ))
            ->add('regon', null, array(
                'label' => 'company.regon'
            ))
            ->add('vatid', null, array(
                'label' => 'company.vatid'
            ))
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Inz\ReportsBundle\Entity\Company'
        ));
    }

    public function getName()
    {
        return 'inz_reportsbundle_company';
    }
}
