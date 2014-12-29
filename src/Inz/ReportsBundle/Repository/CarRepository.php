<?php

namespace Inz\ReportsBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CarRepository extends EntityRepository
{
    public function findCarWithFuel($carId)
    {
         return $this->getEntityManager()
            ->createQuery(
                'SELECT fuel, car FROM InzReportsBundle:Car car
                LEFT JOIN car.fuel fuel
                WHERE car.id = :id'
            )
            ->setParameter('id', $carId)
            ->getOneOrNullResult()
        ;
    }
}
