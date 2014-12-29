<?php

namespace Inz\ReportsBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UnitCostRepository extends EntityRepository
{

    public function getCompanyCarReportDataForGivenYear($companyId, $year)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();

        return $qb->select('
                uc.cost as unitCost, ft.name as fuelType, et.name as engineType,
                SUM(case
                        WHEN fuel.unit = :kg AND YEAR(fuel.tankingDate) = :year AND company.id = :cid THEN fuel.volume
                        WHEN fuel.unit = :l AND YEAR(fuel.tankingDate) = :year AND company.id = :cid THEN (fuel.volume * ft.density / 1000)
                        ELSE 0
                        END
                ) as massSum
            ')
            ->from('InzReportsBundle:UnitCost', 'uc')
            ->join('uc.fuelType','ft')
            ->join('uc.engineType','et')
            ->leftJoin('uc.cars','cars')
            ->leftJoin('cars.company','company')
            ->leftJoin('cars.fuel','fuel')
            ->groupBy('et.name')
            ->addGroupBy('ft.name')
            ->orderBy('et.id')
            ->setParameter(':kg', 'kg')
            ->setParameter(':l', 'l')
            ->setParameter(':cid', $companyId)
            ->setParameter(':year', $year)

            ->getQuery()
            ->getResult()
            ;
    }
}
