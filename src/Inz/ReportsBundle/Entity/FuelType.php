<?php

namespace Inz\ReportsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FuelType
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class FuelType
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * @ORM\Column(type="float", precision=3)
     */
    private $density;

    /**
    * @ORM\OneToMany(targetEntity="UnitCost", mappedBy="fuelType")
    */
    private $unitCost;


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
     * Set name
     *
     * @param string $name
     * @return FuelType
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->unitCost = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add unitCost
     *
     * @param \Inz\ReportsBundle\Entity\UnitCost $unitCost
     * @return FuelType
     */
    public function addUnitCost(\Inz\ReportsBundle\Entity\UnitCost $unitCost)
    {
        $this->unitCost[] = $unitCost;

        return $this;
    }

    /**
     * Remove unitCost
     *
     * @param \Inz\ReportsBundle\Entity\UnitCost $unitCost
     */
    public function removeUnitCost(\Inz\ReportsBundle\Entity\UnitCost $unitCost)
    {
        $this->unitCost->removeElement($unitCost);
    }

    /**
     * Get unitCost
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUnitCost()
    {
        return $this->unitCost;
    }
    
    public function __toString() 
    {
        return $this->name;
    }

    /**
     * Set density
     *
     * @param string $density
     * @return FuelType
     */
    public function setDensity($density)
    {
        $this->density = $density;

        return $this;
    }

    /**
     * Get density
     *
     * @return string 
     */
    public function getDensity()
    {
        return $this->density;
    }
}
