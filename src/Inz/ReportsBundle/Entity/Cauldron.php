<?php

namespace Inz\ReportsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cauldron
 *
 * @ORM\Table(name="cauldron")
 * @ORM\Entity(repositoryClass="Inz\ReportsBundle\Repository\CauldronRepository")
 */
class Cauldron
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
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="CauldronType", inversedBy="cauldrons")
     */
    private $cauldronType;

    /**
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="cauldrons")
     */
    private $company;

    /**
     * @ORM\OneToMany(targetEntity="CauldronTank", mappedBy="cauldron", cascade={"ALL"})
     */
    private $fuel;


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
     * Set company
     *
     * @param \Inz\ReportsBundle\Entity\Company $company
     * @return Cauldron
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
     * Set name
     *
     * @param string $name
     * @return Cauldron
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
     * Set cauldronType
     *
     * @param \Inz\ReportsBundle\Entity\CauldronType $cauldronType
     * @return Cauldron
     */
    public function setCauldronType(\Inz\ReportsBundle\Entity\CauldronType $cauldronType = null)
    {
        $this->cauldronType = $cauldronType;

        return $this;
    }

    /**
     * Get cauldronType
     *
     * @return \Inz\ReportsBundle\Entity\CauldronType 
     */
    public function getCauldronType()
    {
        return $this->cauldronType;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fuel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add fuel
     *
     * @param \Inz\ReportsBundle\Entity\CauldronTank $fuel
     * @return Cauldron
     */
    public function addFuel(\Inz\ReportsBundle\Entity\CauldronTank $fuel)
    {
        $this->fuel[] = $fuel;

        return $this;
    }

    /**
     * Remove fuel
     *
     * @param \Inz\ReportsBundle\Entity\CauldronTank $fuel
     */
    public function removeFuel(\Inz\ReportsBundle\Entity\CauldronTank $fuel)
    {
        $this->fuel->removeElement($fuel);
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
}
