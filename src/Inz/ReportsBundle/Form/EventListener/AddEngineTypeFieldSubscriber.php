<?php

namespace Inz\ReportsBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;
use SMTC\MainBundle\Entity\Province;
use SMTC\MainBundle\Entity\City;

class AddEngineTypeFieldSubscriber implements EventSubscriberInterface
{
    private $fieldName;

    public function __construct($fieldName)
    {
        $this->fieldName = $fieldName;
    }

    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA  => 'preSetData',
            FormEvents::PRE_SUBMIT    => 'preSubmit'
        );
    }

    private function addEngineTypeForm($form, $fuelType_id)
    {
        $formOptions = array(
            'class'         => 'InzReportsBundle:EngineType',
            'label' => 'car.engineType',
            'mapped' => false,
            'query_builder' => function (EntityRepository $repository) use ($fuelType_id) {
                $qb = $repository->createQueryBuilder('et')
                    ->innerJoin('et.unitCost', 'uc')
                    ->where('uc.fuelType = :fuelType_id')
                    ->setParameter('fuelType_id', $fuelType_id)
                ;

                return $qb;
            }
        );

        $form->add($this->fieldName, 'entity', $formOptions);
    }

    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }

        $this->addEngineTypeForm($form, $fuelType_id = null);
    }

    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        $fuelType_id = array_key_exists('fuelType', $data) ? $data['fuelType'] : null;

        $this->addEngineTypeForm($form, $fuelType_id);
    }
}