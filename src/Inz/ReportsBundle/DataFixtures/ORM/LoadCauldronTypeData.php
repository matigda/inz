<?php

namespace Inz\ReportsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Inz\ReportsBundle\Entity\Cauldron;
use Inz\ReportsBundle\Entity\CauldronType;
use Inz\ReportsBundle\Entity\EngineType;
use Inz\ReportsBundle\Entity\FuelType;
use Inz\ReportsBundle\Entity\UnitCost;
use Inz\ReportsBundle\Entity\User;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;

class LoadCauldronTypeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager) 
    {
        $wegiel = new CauldronType();
        $wegiel->setType('Kocioł z rusztem mechanicznym, z urządzeniem odpylającym o mocy =< 3 MW');
        $wegiel->setUnitCost(17.64);
        $wegiel->setFuelDensity(1300);

        $wiekszy = new CauldronType();
        $wiekszy->setType('Kocioł z rusztem mechanicznym, z urządzeniem odpylającym o mocy > 3 MW i <= 5MW');
        $wiekszy->setUnitCost(16.51);
        $wiekszy->setFuelDensity(1300);

        $bez = new CauldronType();
        $bez->setType('Kocioł z rusztem mechanicznym, bez urządzenia odpylającego o mocy <= 5MW');
        $bez->setUnitCost(27.34);
        $bez->setFuelDensity(1300);

        $rusztStaly = new CauldronType();
        $rusztStaly->setType('Kocioł z rusztem stałym, z ciągiem naturalnym o mocy <= 5MW');
        $rusztStaly->setUnitCost(30.61);
        $rusztStaly->setFuelDensity(1300);


        $piec = new Cauldron();
        $piec->setName('Mały');
        $piec->setCauldronType($wegiel);
        $piec->setCompany($this->getReference('firma'));

        $manager->persist($rusztStaly);
        $manager->persist($bez);
        $manager->persist($wegiel);
        $manager->persist($wiekszy);
        $manager->persist($piec);
        $manager->flush();
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 6;
    }

}
