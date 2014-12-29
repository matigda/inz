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
}
