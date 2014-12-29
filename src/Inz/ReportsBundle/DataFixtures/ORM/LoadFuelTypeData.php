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

class LoadFuelTypeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager) 
    {   
        $benzyna = new FuelType();
        $benzyna->setName('Benzyna Silnikowa (BS)');
        // kg/m3
        $benzyna->setDensity('750');
        $this->setReference("benzyna", $benzyna);
        
        $diesel = new FuelType();
        $diesel->setName('Olej napędowy');
        // kg/m3
        $diesel->setDensity('830');
        $this->setReference("diesel", $diesel);
        
        $biodiesel = new FuelType();
        $biodiesel->setName('Biodiesel');
        // kg/m3
        $biodiesel->setDensity('875');
        $this->setReference("biodiesel", $biodiesel);
        
        $propan = new FuelType();
        $propan->setName('Gaz płynny propan-butan');
        // kg/m3
        $propan->setDensity('557');
        $this->setReference("propan", $propan);
        
        $sprezony = new FuelType();
        $sprezony->setName('Sprężony gaz ziemny (silniki fabrycznie przystosowane do zasilania gazem) w tym biometan');
        // kg/m3
        $sprezony->setDensity('0.716');
        $this->setReference("sprezony", $sprezony);

        $przebudowane = new FuelType();
        $przebudowane->setName('Sprężony gaz ziemny (silniki przebudowane) w tym biometan');
        // kg/m3
        $przebudowane->setDensity('0.716');
        $this->setReference("przebudowane", $przebudowane);
        
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3;
    }

}
