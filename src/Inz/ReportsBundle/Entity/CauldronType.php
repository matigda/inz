<?php

namespace Inz\ReportsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CauldronType
 *
 * @ORM\Table(name="cauldron_type")
 * @ORM\Entity
 */
class CauldronType
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
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(name="unit_cost", type="float", precision=2)
     */
    private $unitCost;

    /**
     * @ORM\Column(type="float", precision=3)
     */
    private $fuelDensity;

    /**
     * @ORM\OneToMany(targetEntity="Cauldron", mappedBy="cauldronType")
     */
    private $cauldrons;


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
     * Set type
     *
     * @param string $type
     * @return CauldronType
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set unitCost
     *
     * @param string $unitCost
     * @return CauldronType
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

    public function __toString()
    {
        return $this->type;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cauldrons = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cauldron
     *
     * @param \Inz\ReportsBundle\Entity\Cauldron $cauldron
     * @return CauldronType
     */
    public function addCauldron(\Inz\ReportsBundle\Entity\Cauldron $cauldron)
    {
        $this->cauldrons[] = $cauldron;

        return $this;
    }

    /**
     * Remove cauldron
     *
     * @param \Inz\ReportsBundle\Entity\Cauldron $cauldron
     */
    public function removeCauldron(\Inz\ReportsBundle\Entity\Cauldron $cauldron)
    {
        $this->cauldrons->removeElement($cauldron);
    }

    /**
     * Get cauldron
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCauldrons()
    {
        return $this->cauldrosn;
    }

    /**
     * Set fuelDensity
     *
     * @param float $fuelDensity
     * @return CauldronType
     */
    public function setFuelDensity($fuelDensity)
    {
        $this->fuelDensity = $fuelDensity;

        return $this;
    }

    /**
     * Get fuelDensity
     *
     * @return float 
     */
    public function getFuelDensity()
    {
        return $this->fuelDensity;
    }
}
