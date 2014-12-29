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
                cauldronType.unitCost, cauldronType.type,
                SUM(fuel.volume) as massSum
            ')
            ->from('InzReportsBundle:Company', 'company')
            ->join('company.cauldrons','cauldrons')
            ->join('cauldrons.cauldronType','cauldronType')
            ->join('cauldrons.fuel','fuel')
            ->groupBy('cauldronType.type')
            ->orderBy('cauldronType.id')
            ->where('company.id = :cid')
            ->andWhere('YEAR(fuel.tankingDate) = :year')
            ->setParameter(':cid', $companyId)
            ->setParameter(':year', $year)
            ->getQuery()
            ->getResult();
    }


}
