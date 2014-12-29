<?php

namespace Inz\ReportsBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Inz\ReportsBundle\Entity\Company;
use Inz\ReportsBundle\Entity\Car;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;

class LoadCompanyData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager) 
    {
        $company = new Company();
        $company->setName('Testowa');
        $company->setAdress('Skarzynkiego 8F');
        $company->setRegon('111');
        $company->setVatid('2222');
        $company->setUser($this->getReference('admin'));
        $this->setReference('firma', $company);
        
        $car = new Car();
        $car->setBrand('Matiz');
        $car->setCompany($company);
        $car->setUnitCost($this->getReference('unitCost'));
        
        $manager->persist($company);
        $manager->persist($car);
        $manager->flush();
    }
    
    public function getOrder() 
    {
        return 5;
    }

}
