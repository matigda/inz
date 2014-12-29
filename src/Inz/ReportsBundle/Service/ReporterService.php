<?php

namespace Inz\ReportsBundle\Service;

use Doctrine\ORM\EntityManager;

class ReporterService
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getReportData($company_id, $year)
    {
        $carSum = $this->em->getRepository('InzReportsBundle:UnitCost')->getCompanyCarReportDataForGivenYear($company_id, $year);
        $cauldronSum = $this->em->getRepository('InzReportsBundle:Company')->getCompanyCauldronReportDataForGivenYear($company_id, $year);

        $getTotalSum = function($reportSum) {
            for($i=0; $i<count($reportSum); $i++) {
                // unit cost to koszt na tone, a massSum to masa w kilogramach - dlatego dzielimy jeszcze przez 1000
                $reportSum[$i]['totalCost'] = ( $reportSum[$i]['unitCost'] * $reportSum[$i]['massSum'] ) / 1000;
            }
            return $reportSum;
        };

        $carReport = $this->aggregateData($getTotalSum($carSum));
        $cauldronReport = $getTotalSum($cauldronSum);

        return compact('carReport', 'cauldronReport');
    }

    private function aggregateData($carData)
    {
        $carReport = array();

        foreach($carData as $fuelData) {
            $carReport[$fuelData['engineType']][] = $fuelData;
        }

        return $carReport;
    }

}