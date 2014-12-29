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

        $piec = new Cauldron();
        $piec->setName('Mały');
        $piec->setCauldronType($wegiel);
        $piec->setCompany($this->getReference('firma'));

        $manager->persist($wegiel);
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
