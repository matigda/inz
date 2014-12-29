<?php

namespace Inz\ReportsBundle\Repository;

use Doctrine\ORM\EntityRepository;
use FOS\UserBundle\Model\UserInterface;

class CompanyRepository extends EntityRepository
{
    public function findCompanyWithCars($companyId)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT c, car FROM InzReportsBundle:Company c 
                LEFT JOIN c.cars car
                WHERE c.id = :id'
            )
            ->setParameter('id', $companyId)
            ->getOneOrNullResult();
    }

    public function getCompanyCarReportDataForGivenYear($companyId, $year)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();

        return $qb->select('
                uc.cost as unitCost, ft.name as fuelType, et.name as engineType,
                SUM(case when fuel.unit = :kg then fuel.volume else (fuel.volume * ft.density) end) as massSum
            ')
            ->from('InzReportsBundle:Company', 'company')
            ->join('company.cars','cars')
            ->join('cars.unitCost','uc')
            ->join('uc.fuelType','ft')
            ->join('uc.engineType','et')
            ->join('cars.fuel','fuel')
            ->groupBy('et.name')
            ->addGroupBy('ft.name')
            ->orderBy('et.id')
            ->where('company.id = :cid')
            ->andWhere('YEAR(fuel.tankingDate) = :year')
            ->setParameter(':kg', 'kg')
            ->setParameter(':cid', $companyId)
            ->setParameter(':year', $year)
            ->getQuery()
            ->getResult()
            ;
    }

    public function getCompanyCauldronReportDataForGivenYear($companyId, $year)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();

        return $qb->select('
                cauldronType.unitCost, cauldronType.type, COUNT(cauldrons.id) as cauldronsAmount,
                 SUM(case
                        WHEN fuel.unit = :kg AND YEAR(fuel.tankingDate) = :year AND company.id = :cid THEN fuel.volume
                        WHEN fuel.unit = :l AND YEAR(fuel.tankingDate) = :year AND company.id = :cid THEN (fuel.volume * cauldronType.fuelDensity)
                        ELSE 0
                        END
                ) as massSum
            ')
            ->from('InzReportsBundle:CauldronType','cauldronType')
            ->leftJoin('cauldronType.cauldrons','cauldrons')
            ->leftJoin('cauldrons.company', 'company')
            ->leftJoin('cauldrons.fuel','fuel')
            ->groupBy('cauldronType.type')
            ->orderBy('cauldronType.id')
            ->setParameter(':kg', 'kg')
            ->setParameter(':l', 'l')
            ->setParameter(':cid', $companyId)
            ->setParameter(':year', $year)
            ->getQuery()
            ->getResult();
    }


}
