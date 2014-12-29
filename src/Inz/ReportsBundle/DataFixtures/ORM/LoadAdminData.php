<?php

namespace Inz\ReportsBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Inz\ReportsBundle\Entity\User;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;

class LoadAdminData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager) 
    {
        $admin = new User();
        $admin->setUsername('admin');
        $admin->setEmail('test@test.pl');
        $admin->setPlainPassword('admin');
        $admin->setEnabled(true);
        
        $this->setReference("admin", $admin);
        $manager->persist($admin);
        $manager->flush();
    }

    public function getOrder() 
    {
        return 1;
    }

}
