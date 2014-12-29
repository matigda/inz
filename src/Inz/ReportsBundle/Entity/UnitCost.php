<?php

namespace Inz\ReportsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UnitCost
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Inz\ReportsBundle\Repository\UnitCostRepository")
 */
class UnitCost
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
     * @ORM\Column(name="cost", type="float", precision=2)
     */
    private $cost;

    /**
    * @ORM\ManyToOne(targetEntity="EngineType", cascade={"persist"})
    */
    private $engineType;

    /**
    * @ORM\ManyToOne(targetEntity="FuelType", cascade={"persist"})
    */
    private $fuelType;

    /**
     *
     * @ORM\OneToMany(targetEntity="Car", mappedBy="unitCost")
     */
    private $cars;

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
     * Set cost
     *
     * @param string $cost
     * @return UnitCost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return string 
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set engineType
     *
     * @param \Inz\ReportsBundle\Entity\EngineType $engineType
     * @return UnitCost
     */
    public function setEngineType(\Inz\ReportsBundle\Entity\EngineType $engineType = null)
    {
        $this->engineType = $engineType;

        return $this;
    }

    /**
     * Get engineType
     *
     * @return \Inz\ReportsBundle\Entity\EngineType 
     */
    public function getEngineType()
    {
        return $this->engineType;
    }

    /**
     * Set fuelType
     *
     * @param \Inz\ReportsBundle\Entity\FuelType $fuelType
     * @return UnitCost
     */
    public function setFuelType(\Inz\ReportsBundle\Entity\FuelType $fuelType = null)
    {
        $this->fuelType = $fuelType;

        return $this;
    }

    /**
     * Get fuelType
     *
     * @return \Inz\ReportsBundle\Entity\FuelType 
     */
    public function getFuelType()
    {
        return $this->fuelType;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cars = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cars
     *
     * @param \Inz\ReportsBundle\Entity\Car $cars
     * @return UnitCost
     */
    public function addCar(\Inz\ReportsBundle\Entity\Car $cars)
    {
        $this->cars[] = $cars;

        return $this;
    }

    /**
     * Remove cars
     *
     * @param \Inz\ReportsBundle\Entity\Car $cars
     */
    public function removeCar(\Inz\ReportsBundle\Entity\Car $cars)
    {
        $this->cars->removeElement($cars);
    }

    /**
     * Get cars
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCars()
    {
        return $this->cars;
    }
}
