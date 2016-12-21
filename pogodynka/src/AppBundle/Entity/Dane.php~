<?php
// src/AppBundle/Entity/Dane.php
namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\City;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DaneRepository")
 * @ORM\Table(name="data")
 */
 
class Dane
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $city_name;
    
    /**
     * @ORM\OneToMany(targetEntity="City", mappedBy="cities")
     * @ORM\JoinColumn(name="city_name", referencedColumnName="city_name")
     */
     
    private $data;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
     
    public $icon;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
     
    public $iconurl;
    
    /**
     * @ORM\Column(type="decimal", scale=2)
     */
     
    public $temp;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    
    public $temp_min;

    /**
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
     
    public $temp_max;
    
    /**
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
     
    public $pressure;

    /**
     * @ORM\Column(type="integer")
     */
     
    public $humidity;

    /**
     * @ORM\Column(type="datetime", name="posted_at") 
     */
    private $postedAt;

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
     * Set cityCode
     *
     * @param integer $cityCode
     *
     * @return Dane
     */
    public function setCityName($cityName)
    {
        $this->city_name = $cityName;

        return $this;
    }

    /**
     * Get cityCode
     *
     * @return integer
     */
    public function getCityName()
    {
        return $this->city_name;
    }

    /**
     * Set icon
     *
     * @param string $icon
     *
     * @return Dane
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string
     */
    public function getIcon()
    {
      if(strpos($this->iconurl,'%s')!==false)
        return sprintf($this->iconurl, $this->icon);
      else  
        return $this->icon;
    }

    /**
     * Set temp
     *
     * @param string $temp
     *
     * @return Dane
     */
    public function setTemp($temp)
    {
        $this->temp = $temp;

        return $this;
    }

    /**
     * Get temp
     *
     * @return string
     */
    public function getTemp()
    {
        return $this->temp;
    }

    /**
     * Set tempMin
     *
     * @param string $tempMin
     *
     * @return Dane
     */
    public function setTempMin($tempMin)
    {
        $this->temp_min = $tempMin;

        return $this;
    }

    /**
     * Get tempMin
     *
     * @return string
     */
    public function getTempMin()
    {
        return $this->temp_min;
    }

    /**
     * Set tempMax
     *
     * @param string $tempMax
     *
     * @return Dane
     */
    public function setTempMax($tempMax)
    {
        $this->temp_max = $tempMax;

        return $this;
    }

    /**
     * Get tempMax
     *
     * @return string
     */
    public function getTempMax()
    {
        return $this->temp_max;
    }

    /**
     * Set pressure
     *
     * @param string $pressure
     *
     * @return Dane
     */
    public function setPressure($pressure)
    {
        $this->pressure = $pressure;

        return $this;
    }

    /**
     * Get pressure
     *
     * @return string
     */
    public function getPressure()
    {
        return $this->pressure;
    }

    /**
     * Set humidity
     *
     * @param integer $humidity
     *
     * @return Dane
     */
    public function setHumidity($humidity)
    {
        $this->humidity = $humidity;

        return $this;
    }

    /**
     * Get humidity
     *
     * @return integer
     */
    public function getHumidity()
    {
        return $this->humidity;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->data = new \Doctrine\Common\Collections\ArrayCollection();
        $this->postedAt = new \DateTime();
        $this->temp_min=0;
        $this->temp_max=0;
        $this->humidity=0;        
    }

    /**
     * Set postedAt
     *
     * @param \DateTime $postedAt
     *
     * @return Dane
     */
    public function setPostedAt($postedAt)
    {
        $this->postedAt = $postedAt;

        return $this;
    }

    /**
     * Get postedAt
     *
     * @return \DateTime
     */
    public function getPostedAt()
    {
        return $this->postedAt->format('Y-m-d');
    }

    /**
     * Add datum
     *
     * @param \AppBundle\Entity\City $datum
     *
     * @return Dane
     */
    public function addDatum(\AppBundle\Entity\City $datum)
    {
        $this->data[] = $datum;

        return $this;
    }

    /**
     * Remove datum
     *
     * @param \AppBundle\Entity\City $datum
     */
    public function removeDatum(\AppBundle\Entity\City $datum)
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
     * Set iconurl
     *
     * @param string $iconurl
     *
     * @return Dane
     */
    public function setIconurl($iconurl)
    {
        $this->iconurl = $iconurl;

        return $this;
    }

    /**
     * Get iconurl
     *
     * @return string
     */
    public function getIconurl()
    {
        return $this->iconurl;
    }
}
