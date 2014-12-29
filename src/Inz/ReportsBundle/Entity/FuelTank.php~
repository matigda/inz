<?php

namespace Inz\ReportsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fuel
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class FuelTank
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="float", precision=2)
     */
    private $volume;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tankingDate", type="datetime")
     */
    private $tankingDate;
    
    /**
     * @ORM\ManyToOne(targetEntity="Car", inversedBy="fuel")
     */
    private $car;

    /**
     * @var string
     *
     * @ORM\Column(name="unit", type="string", length=255)
     */
    private $unit;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set volume
     *
     * @param string $volume
     * @return Fuel
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;

        return $this;
    }

    /**
     * Get volume
     *
     * @return string 
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * Set tankingDate
     *
     * @param \DateTime $tankingDate
     * @return Fuel
     */
    public function setTankingDate($tankingDate)
    {
        $this->tankingDate = $tankingDate;

        return $this;
    }

    /**
     * Get tankingDate
     *
     * @return \DateTime 
     */
    public function getTankingDate()
    {
        return $this->tankingDate;
    }

    /**
     * Set car
     *
     * @param \Inz\ReportsBundle\Entity\Car $car
     * @return Fuel
     */
    public function setCar(\Inz\ReportsBundle\Entity\Car $car = null)
    {
        $this->car = $car;

        return $this;
    }

    /**
     * Get car
     *
     * @return \Inz\ReportsBundle\Entity\Car 
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * Set unit
     *
     * @param string $unit
     * @return FuelTank
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return string 
     */
    public function getUnit()
    {
        return $this->unit;
    }
}
