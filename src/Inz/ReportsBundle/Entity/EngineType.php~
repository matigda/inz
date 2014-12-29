<?php

namespace Inz\ReportsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EngineType
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Inz\ReportsBundle\Repository\EngineTypeRepository")
 */
class EngineType
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
    * @ORM\OneToMany(targetEntity="UnitCost", mappedBy="engineType")
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
     * @return EngineType
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
     * Set fuel
     *
     * @param string $fuel
     * @return EngineType
     */
    public function setFuel($fuel)
    {
        $this->fuel = $fuel;

        return $this;
    }

    /**
     * Get fuel
     *
     * @return string 
     */
    public function getFuel()
    {
        return $this->fuel;
    }

    /**
     * Set unitCost
     *
     * @param string $unitCost
     * @return EngineType
     */
    public function setUnitCost($unitCost)
    {
        $this->unitCost = $unitCost;

        return $this;
    }

    /**
     * Get unitCost
     *
     * @return string 
     */
    public function getUnitCost()
    {
        return $this->unitCost;
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
     * @return EngineType
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
    
    public function __toString() 
    {
        return $this->name;
    }
}
