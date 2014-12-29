<?php

namespace Inz\ReportsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Inz\ReportsBundle\Form\EventListener\AddEngineTypeFieldSubscriber;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Doctrine\ORM\EntityManagerInterface;

class CarType extends AbstractType
{
    private $em;
    
    public function __construct(EntityManagerInterface $em) 
    {
        $this->em = $em;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('brand', null, array(
                'label' => 'car.brand'
            ))
            ->add('fuelType','entity', array(
                'label' => 'car.fuelType',
                'mapped' => false,
                'class' => 'Inz\ReportsBundle\Entity\FuelType'
            ))
        ;
        
        $builder->addEventSubscriber(new AddEngineTypeFieldSubscriber('engineType'));
        
        $builder->addEventListener(FormEvents::POST_SUBMIT, function(FormEvent $event) 
        {
            $carEntity = $event->getForm()->getData();
            $engineTypeEntity = $event->getForm()->get('engineType')->getData();
            $fuelTypeEntity = $event->getForm()->get('fuelType')->getData();

            if($engineTypeEntity == null) {
                $event->getForm()->get('engineType')->addError(new FormError('This value cannot be blank.'));
            } else {
                $unitCostEntity = $this->em->getRepository('InzReportsBundle:UnitCost')->findOneBy(array('fuelType' => $fuelTypeEntity, 'engineType' => $engineTypeEntity));
                $carEntity->setUnitCost($unitCostEntity);
            }
                                
        });

    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Inz\ReportsBundle\Entity\Car'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'inz_reportsbundle_car';
    }
}
