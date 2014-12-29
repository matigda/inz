<?php

namespace Inz\ReportsBundle\Repository;

use Doctrine\ORM\EntityRepository;

class EngineTypeRepository extends EntityRepository
{
    
    public function getEngineTypeByFuelTypeId($fuelTypeId)
    {
         return $this->getEntityManager()
            ->createQuery(
                'SELECT et.id, et.name FROM InzReportsBundle:EngineType et
                JOIN et.unitCost uc
                WHERE uc.fuelType = :fuelTypeId'
            )
            ->setParameter('fuelTypeId', $fuelTypeId)
            ->getResult()
        ;
    }
}