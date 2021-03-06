<?php

namespace Inz\ReportsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CauldronTank
 *
 * @ORM\Table(name="cauldron_tank")
 * @ORM\Entity
 */
class CauldronTank
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
     * @ORM\ManyToOne(targetEntity="Cauldron")
     */
    private $cauldron;

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
     * @param float $volume
     * @return CauldronTank
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;

        return $this;
    }

    /**
     * Get volume
     *
     * @return float 
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * Set tankingDate
     *
     * @param \DateTime $tankingDate
     * @return CauldronTank
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
     * Set cauldron
     *
     * @param \Inz\ReportsBundle\Entity\Cauldron $cauldron
     * @return CauldronTank
     */
    public function setCauldron(\Inz\ReportsBundle\Entity\Cauldron $cauldron = null)
    {
        $this->cauldron = $cauldron;

        return $this;
    }

    /**
     * Get cauldron
     *
     * @return \Inz\ReportsBundle\Entity\Cauldron 
     */
    public function getCauldron()
    {
        return $this->cauldron;
    }

    /**
     * Set unit
     *
     * @param string $unit
     * @return CauldronTank
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
