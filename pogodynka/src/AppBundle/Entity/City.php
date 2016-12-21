<?php
// src/AppBundle/Entity/City.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use AppBundle\Entity\Dane;

/**
 * @ORM\Entity
 * @ORM\Table(name="cities")
 */
 
 
class City
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     
    private $id;

    /**
     * @ORM\Column(name="city_code", type="integer")
     */
     
    public $cityCode;
     
    /**
     * @ORM\Column(type="string", length=100)
     */
     
    private $city_name;
    
    /**
     * @ORM\Column(type="decimal", scale=6)
     */
     
    public $coord_lon;
    
    /**
     * @ORM\Column(type="decimal", scale=6)
     */
     
    public $coord_lat;

    /**
     * @ORM\OneToMany(targetEntity="Dane", mappedBy="city")
     */
    public $data;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function __construct() {
        $this->data = new ArrayCollection();
    }
    
    /**
     * Set city_name
     *
     * @param string $city_name
     *
     * @return City
     */
    public function setName($city_name)
    {
        $this->city_name = $city_name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->city_name;
    }

    /**
     * Set coordLon
     *
     * @param string $coordLon
     *
     * @return City
     */
    public function setCoordLon($coordLon)
    {
        $this->coord_lon = $coordLon;

        return $this;
    }

    /**
     * Get coordLon
     *
     * @return string
     */
    public function getCoordLon()
    {
        return $this->coord_lon;
    }

    /**
     * Set coordLat
     *
     * @param string $coordLat
     *
     * @return City
     */
    public function setCoordLat($coordLat)
    {
        $this->coord_lat = $coordLat;

        return $this;
    }

    /**
     * Get coordLat
     *
     * @return string
     */
    public function getCoordLat()
    {
        return $this->coord_lat;
    }

    /**
     * Set cityCode
     *
     * @param integer $cityCode
     *
     * @return City
     */
    public function setCityCode($cityCode)
    {
        $this->cityCode = $cityCode;

        return $this;
    }

    /**
     * Get cityCode
     *
     * @return integer
     */
    public function getCityCode()
    {
        return $this->cityCode;
    }

    /**
     * Add datum
     *
     * @param \AppBundle\Entity\Dane $datum
     *
     * @return City
     */
    public function addDatum(\AppBundle\Entity\Dane $datum)
    {
        $this->data[] = $datum;

        return $this;
    }

    /**
     * Remove datum
     *
     * @param \AppBundle\Entity\Dane $datum
     */
    public function removeDatum(\AppBundle\Entity\Dane $datum)
    {
        $this->data->removeElement($datum);
    }

    /**
     * Get data
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set cityName
     *
     * @param string $cityName
     *
     * @return City
     */
    public function setCityName($cityName)
    {
        $this->city_name = $cityName;

        return $this;
    }

    /**
     * Get cityName
     *
     * @return string
     */
    public function getCityName()
    {
        return $this->city_name;
    }
}
