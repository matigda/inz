<?php

namespace Inz\ReportsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Company
 *
 * @ORM\Table(name="company")
 * @ORM\Entity(repositoryClass="Inz\ReportsBundle\Repository\CompanyRepository")
 */
class Company
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     *
     * @ORM\Column(type="string", length=255)
     */
    private $adress;
    

    /**
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $user;
    
    /**
     * @var string
     *
     * @ORM\Column(name="regon", type="string", length=255)
     */
    private $regon;
    
    /**
     * @var string
     *
     * @ORM\Column(name="vatid", type="string", length=255)
     */
    private $vatid;

    /**
     * @ORM\OneToMany(targetEntity="Car", mappedBy="company")
     */
    private $cars;

    /**
     * @ORM\OneToMany(targetEntity="Cauldron", mappedBy="company")
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
     * Set name
     *
     * @param string $name
     * @return Company
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
     * Set user
     *
     * @param \Inz\ReportsBundle\Entity\User $user
     * @return Company
     */
    public function setUser(\Inz\ReportsBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Inz\ReportsBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
    
    public function __toString() {
        return $this->name;
    }

    /**
     * Set regon
     *
     * @param string $regon
     * @return Company
     */
    public function setRegon($regon)
    {
        $this->regon = $regon;

        return $this;
    }

    /**
     * Get regon
     *
     * @return string 
     */
    public function getRegon()
    {
        return $this->regon;
    }

    /**
     * Set vatid
     *
     * @param string $vatid
     * @return Company
     */
    public function setVatid($vatid)
    {
        $this->vatid = $vatid;

        return $this;
    }

    /**
     * Get vatid
     *
     * @return string 
     */
    public function getVatid()
    {
        return $this->vatid;
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
     * @return Company
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

    /**
     * Set adress
     *
     * @param string $adress
     * @return Company
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string 
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Add cauldrons
     *
     * @param \Inz\ReportsBundle\Entity\Cauldron $cauldrons
     * @return Company
     */
    public function addCauldron(\Inz\ReportsBundle\Entity\Cauldron $cauldrons)
    {
        $this->cauldrons[] = $cauldrons;

        return $this;
    }

    /**
     * Remove cauldrons
     *
     * @param \Inz\ReportsBundle\Entity\Cauldron $cauldrons
     */
    public function removeCauldron(\Inz\ReportsBundle\Entity\Cauldron $cauldrons)
    {
        $this->cauldrons->removeElement($cauldrons);
    }

    /**
     * Get cauldrons
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCauldrons()
    {
        return $this->cauldrons;
    }
}
