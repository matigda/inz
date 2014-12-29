<?php

namespace Inz\ReportsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Car
 *
 * @ORM\Table(name="car")
 * @ORM\Entity(repositoryClass="Inz\ReportsBundle\Repository\CarRepository")
 */
class Car
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
     *
     * @ORM\Column(type="string", length=255)
     */
    private $brand;

    /**
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="cars")
     */
    private $company;
    
    /**
     * @ORM\OneToMany(targetEntity="FuelTank", mappedBy="car")
     */
    private $fuel;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="UnitCost", inversedBy="cars")
     */
    private $unitCost;


    /**
     * Add fuel
     *
     * @param \Inz\ReportsBundle\Entity\Fuel $fuel
     * @return Car
     */
    public function addFuel(\Inz\ReportsBundle\Entity\Fuel $fuel)
    {
        $this->fuel[] = $fuel;

        return $this;
    }

    /**
     * Remove fuel
     *
     * @param \Inz\ReportsBundle\Entity\Fuel $fuel
     */
    public function removeFuel(\Inz\ReportsBundle\Entity\Fuel $fuel)
    {
        $this->fuel->removeElement($fuel);
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fuel = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set brand
     *
     * @param string $brand
     * @return Car
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return string 
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set company
     *
     * @param \Inz\ReportsBundle\Entity\Company $company
     * @return Car
     */
    public function setCompany(\Inz\ReportsBundle\Entity\Company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Inz\ReportsBundle\Entity\Company 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Get fuel
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFuel()
    {
        return $this->fuel;
    }

    /**
     * Set unitCost
     *
     * @param \Inz\ReportsBundle\Entity\UnitCost $unitCost
     * @return Car
     */
    public function setUnitCost(\Inz\ReportsBundle\Entity\UnitCost $unitCost = null)
    {
        $this->unitCost = $unitCost;

        return $this;
    }

    /**
     * Get unitCost
     *
     * @return \Inz\ReportsBundle\Entity\UnitCost 
     */
    public function getUnitCost()
    {
        return $this->unitCost;
    }
}
