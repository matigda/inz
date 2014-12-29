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

class LoadEngineTypeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager) 
    {
        $silniki = array(
            'Silniki w samochodach osobowych zarejestrowanych po raz pierwszy do dnia 31.12.1992',
            'Silniki w samochodach osobowych zarejestrowanych po raz pierwszy w okresie 01.01.1993 r. – 31.12.1996 r. lub z dokumentem potwierdzającym spełnienie wymagań EURO 1',
            'Silniki w samochodach osobowych zarejestrowanych po raz pierwszy w okresie 01.01.1997 r. – 31.12.2000 r. lub z dokumentem potwierdzającym spełnienie wymagań EURO 2',
            'Silniki w samochodach osobowych zarejestrowanych po raz pierwszy w okresie 01.01.2001 r. – 31.12.2005 r. lub z dokumentem potwierdzającym spełnienie wymagań EURO 3',
            'Silniki w samochodach osobowych zarejestrowanych po raz pierwszy po dniu 31.12.2005 r. lub z dokumentem potwierdzającym spełnienie wymagań EURO 4',
            'Silniki w samochodach osobowych z dokumentem potwierdzającym spełnienie wymagań EURO 5',
            'Silniki w samochodach o dopuszczalnej masie całkowitej do 3,5 Mg innych niż osobowe zarejestrowanych po raz pierwszy do dnia 30.09.1993 r.',
            'Silniki w samochodach o dopuszczalnej masie całkowitej do 3,5 Mg innych niż osobowe zarejestrowanych po raz pierwszy w okresie 01.10.1993 r. - 30.06.1997 r. lub z dokumentem potwierdzającym spełnienie wymagań EURO 1',
            'Silniki w samochodach o dopuszczalnej masie całkowitej do 3,5 Mg innych niż osobowe zarejestrowanych po raz pierwszy w okresie 01.07.1997 r. - 30.06.2001 r. lub z dokumentem potwierdzającym spełnienie wymagań EURO 2',
            'Silniki w samochodach o dopuszczalnej masie całkowitej do 3,5 Mg innych niż osobowe zarejestrowanych po raz pierwszy w okresie 30.07.2001 r. - 30.06.2006 r. lub z dokumentem potwierdzającym spełnienie wymagań EURO 3',
            'Silniki w samochodach o dopuszczalnej masie całkowitej do 3,5 Mg innych niż osobowe zarejestrowanych po raz pierwszy po dniu 30.06.2006 r. lub z dokumentem potwierdzającym spełnienie wymagań EURO 4',
            'Silniki w samochodach o dopuszczalnej masie całkowitej do 3,5 Mg innych niż osobowe z dokumentem potwierdzającym spełnienie wymagań EURO 5',
            'Silniki w pojazdach samochodowych o dopuszczalnej masie całkowitej powyżej 3,5 Mg, z wyjątkiem autobusów, zarejestrowanych po raz pierwszy do dnia 30.09.1993 r',
            'Silniki w autobusach o dopuszczalnej masie całkowitej powyżej 3,5 Mg zarejestrowanych po raz pierwszy do dnia 30.09.1993 r',
            'Silniki w pojazdach samochodowych o dopuszczalnej masie całkowitej powyżej 3,5 Mg zarejestrowanych po raz pierwszy w okresie 01.10.1993 r. - 30.09.1996 r. lub z dokumentem potwierdzającym spełnienie wymagań EURO 1',
            'Silniki w pojazdach samochodowych o dopuszczalnej masie całkowitej powyżej 3,5 Mg zarejestrowanych po raz pierwszy w okresie 01.10.1996 r. - 30.09.2001 r. lub z dokumentem potwierdzającym spełnienie wymagań EURO 2',
            'Silniki w pojazdach samochodowych o dopuszczalnej masie całkowitej powyżej 3,5 Mg zarejestrowanych po raz pierwszy w okresie 01.10.2001 r. - 30.09.2006 r. lub z dokumentem potwierdzającym spełnienie wymagań EURO 3',
            'Silniki w pojazdach samochodowych o dopuszczalnej masie całkowitej powyżej 3,5 Mg zarejestrowanych po raz pierwszy w okresie 01.10.2006 r. – 30.09.2009 r. lub z dokumentem potwierdzającym spełnienie wymagań EURO 4',
            'Silniki w pojazdach samochodowych o dopuszczalnej masie całkowitej powyżej 3,5 Mg z dokumentem potwierdzającym spełnienie wymagań EURO 5',
            'Silniki w ciągnikach rolniczych zarejestrowanych po raz pierwszy do dnia 30.06.2001 r.',
            'Silniki w ciągnikach rolniczych zarejestrowanych po raz pierwszy w okresie 01.07.2001 r. – 31.12.2003 r. lub z dokumentem potwierdzającym spełnienie wymagań etapu I',
            'Silniki w ciągnikach rolniczych zarejestrowanych po raz pierwszy w okresie 01.01.2004 r. – 31.12.2007 r. lub z dokumentem potwierdzającym spełnienie wymagań etapu II',
            'Silniki w ciągnikach rolniczych zarejestrowanych po raz pierwszy po dniu 01.01.2008 r. lub z dokumentem potwierdzającym spełnienie wymagań etapu IIIA',
            'Silniki w pojazdach wolnobieżnych, maszynach i urządzeniach wyprodukowanych do 1999 r.',
            'Silniki w pojazdach wolnobieżnych, maszynach i urządzeniach wyprodukowanych w latach 2000 - 2003 lub z dokumentem potwierdzającym spełnienie wymagań etapu I',
            'Silniki w pojazdach wolnobieżnych, maszynach i urządzeniach wyprodukowanych w latach 2004 - 2008 lub z dokumentem potwierdzającym spełnienie wymagań etapu II',
            'Silniki w pojazdach wolnobieżnych, maszynach i urządzeniach z dokumentem potwierdzającym spełnienie wymagań etapu IIIA',
            'Silniki w pojazdach szynowych wyprodukowanych do 2007 r.',
            'Silniki w pojazdach szynowych wyprodukowanych po 2007 r. lub z dokumentem potwierdzającym spełnienie wymagań etapu IIIA',
            'Silniki w jednostkach pływających żeglugi śródlądowej wyprodukowanych do 2007 r.',
            'Silniki w jednostkach pływających żeglugi śródlądowej wyprodukowanych po 2007 r. lub z dokumentem potwierdzającym spełnienie wymagań etapu IIIA',
            'Silniki w innych pojazdach samochodowych o dopuszczalnej masie całkowitej do 3,5 Mg i w motorowerach'
        
        );
        
        for ( $i=0; $i<count($silniki); $i++ ) {
            $zmienna = 'silnik'.$i;
            $$zmienna = new EngineType();
            $$zmienna->setName($silniki[$i]);
            $this->setReference($zmienna, $$zmienna);
        }
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }

}
