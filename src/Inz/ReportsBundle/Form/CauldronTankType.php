<?php

namespace Inz\ReportsBundle\Form;

use Inz\ReportsBundle\Entity\Cauldron;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

class CauldronTankType extends AbstractType
{
    private $cauldron;

    public function __construct(Cauldron $cauldron)
    {
        $this->cauldron = $cauldron;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('volume')
            ->add('tankingDate')

            ->addEventListener(FormEvents::POST_SUBMIT, function(FormEvent $event) {

                $entity = $event->getForm()->getData();
                $entity->setCauldron($this->cauldron);
            })
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Inz\ReportsBundle\Entity\CauldronTank'
        ));
    }

    public function getName()
    {
        return 'inz_reportsbundle_cauldrontank';
    }
}
