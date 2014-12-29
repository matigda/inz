<?php

namespace Inz\ReportsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Inz\ReportsBundle\Entity\EngineType;
use Inz\ReportsBundle\Entity\FuelType;
use Inz\ReportsBundle\Entity\UnitCost;
use Inz\ReportsBundle\Entity\User;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;

class LoadUnitCostsData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager) 
    {   
        $unitCost = new UnitCost();
        $unitCost->setEngineType($this->getReference('silnik1'));
        $unitCost->setFuelType($this->getReference('benzyna'));
        $unitCost->setCost(76.06);
        $this->setReference('unitCost', $unitCost);
        
        $unitCost1 = new UnitCost();
        $unitCost1->setEngineType($this->getReference('silnik1'));
        $unitCost1->setFuelType($this->getReference('propan'));
        $unitCost1->setCost(48.78);
        
        $unitCost2 = new UnitCost();
        $unitCost2->setEngineType($this->getReference('silnik1'));
        $unitCost2->setFuelType($this->getReference('diesel'));
        $unitCost2->setCost(20.76);
        
        $unitCost3 = new UnitCost();
        $unitCost3->setEngineType($this->getReference('silnik1'));
        $unitCost3->setFuelType($this->getReference('biodiesel'));
        $unitCost3->setCost(16.94);
        
        $unitCost4 = new UnitCost();
        $unitCost4->setEngineType($this->getReference('silnik2'));
        $unitCost4->setFuelType($this->getReference('benzyna'));
        $unitCost4->setCost(28.88);
        
        $unitCost5 = new UnitCost();
        $unitCost5->setEngineType($this->getReference('silnik2'));
        $unitCost5->setFuelType($this->getReference('propan'));
        $unitCost5->setCost(42.05);
        
        $unitCost6 = new UnitCost();
        $unitCost6->setEngineType($this->getReference('silnik2'));
        $unitCost6->setFuelType($this->getReference('diesel'));
        $unitCost6->setCost(12.04);
        
        $unitCost7 = new UnitCost();
        $unitCost7->setEngineType($this->getReference('silnik2'));
        $unitCost7->setFuelType($this->getReference('biodiesel'));
        $unitCost7->setCost(10.76);
        
        $unitCost8 = new UnitCost();
        $unitCost8->setEngineType($this->getReference('silnik3'));
        $unitCost8->setFuelType($this->getReference('benzyna'));
        $unitCost8->setCost(19.32);
        
        $unitCost9 = new UnitCost();
        $unitCost9->setEngineType($this->getReference('silnik3'));
        $unitCost9->setFuelType($this->getReference('propan'));
        $unitCost9->setCost(27.64);
        
        $unitCost10 = new UnitCost();
        $unitCost10->setEngineType($this->getReference('silnik3'));
        $unitCost10->setFuelType($this->getReference('diesel'));
        $unitCost10->setCost(12.04);
        
        $unitCost11 = new UnitCost();
        $unitCost11->setEngineType($this->getReference('silnik3'));
        $unitCost11->setFuelType($this->getReference('biodiesel'));
        $unitCost11->setCost(10.76);
        
        
        
        
        $unitCost12 = new UnitCost();
        $unitCost12->setEngineType($this->getReference('silnik4'));
        $unitCost12->setFuelType($this->getReference('benzyna'));
        $unitCost12->setCost(12.58);
        
        $unitCost13 = new UnitCost();
        $unitCost13->setEngineType($this->getReference('silnik4'));
        $unitCost13->setFuelType($this->getReference('propan'));
        $unitCost13->setCost(17.9);
        
        $unitCost14 = new UnitCost();
        $unitCost14->setEngineType($this->getReference('silnik4'));
        $unitCost14->setFuelType($this->getReference('sprezony'));
        $unitCost14->setCost(11.27);
        
        $unitCost15 = new UnitCost();
        $unitCost15->setEngineType($this->getReference('silnik4'));
        $unitCost15->setFuelType($this->getReference('przebudowane'));
        $unitCost15->setCost(13.35);
        
        $unitCost16 = new UnitCost();
        $unitCost16->setEngineType($this->getReference('silnik4'));
        $unitCost16->setFuelType($this->getReference('diesel'));
        $unitCost16->setCost(9.28);
        
        $unitCost17 = new UnitCost();
        $unitCost17->setEngineType($this->getReference('silnik4'));
        $unitCost17->setFuelType($this->getReference('biodiesel'));
        $unitCost17->setCost(8.25);
        
        
        $manager->persist($unitCost);
        $manager->persist($unitCost1);
        $manager->persist($unitCost2);
        $manager->persist($unitCost3);
        $manager->persist($unitCost4);
        $manager->persist($unitCost5);
        $manager->persist($unitCost6);
        $manager->persist($unitCost7);
        $manager->persist($unitCost8);
        $manager->persist($unitCost9);
        $manager->persist($unitCost10);
        $manager->persist($unitCost11);
        $manager->persist($unitCost12);
        $manager->persist($unitCost13);
        $manager->persist($unitCost14);
        $manager->persist($unitCost15);
        $manager->persist($unitCost16);
        $manager->persist($unitCost17);
        $manager->flush();
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 4;
    }

}
