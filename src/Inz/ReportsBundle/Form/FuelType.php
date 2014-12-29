<?php

namespace Inz\ReportsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Inz\ReportsBundle\Entity\Car;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

class FuelType extends AbstractType
{
    private $car;
    
    public function __construct(Car $car) 
    {
        $this->car = $car;
    }
    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('volume', null, array(
                'label' => 'fuel.volume'
            ))
            ->add('unit', 'choice', array(
                'choices' => array( 'l' => 'litry', 'kg' => 'kilogramy' )
            ))
            ->add('tankingDate', null, array(
                'label' => 'fuel.tankingDate'
            ))
            ->addEventListener(FormEvents::POST_SUBMIT, function(FormEvent $event) {
                
                $entity = $event->getForm()->getData();
                $entity->setCar($this->car);
            })
              
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Inz\ReportsBundle\Entity\FuelTank'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'inz_reportsbundle_fuel';
    }
}
