<?php
// src/AppBundle/Entity/Services.php
namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Dane;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DaneRepository")
 * @ORM\Table(name="uslugi")
 */
 
class Services
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     
    private $id;
    
    /**
     * @ORM\Column(type="string", length=128, unique=true)
     */
    private $service_name;
    
    /**
     * @ORM\Column(type="string", length=1024)
     */
    private $url;
    
    /**
     * @ORM\Column(type="string", length=1024)
     */
    private $validate;
    
    /**
     * @ORM\Column(type="string", length=1024)
     */
    private $iconurl;
    
    /**
     * @ORM\Column(type="string", length=1024)
     */
    private $post;
        
    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;
    
   /**
     * @ORM\Column(type="string", length=1024)
     */
    private $mapping;
    
    public function query($cityname){
	      
		$url = str_replace('%s',$cityname,$this->url);
		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HEADER, false);
		if($post=str_replace("\n",'&',$this->post))
		  curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
		$data = curl_exec($curl);
		curl_close($curl);
      
		if($data == '')
		  return [];
	
	//	$data='{"message":"accurate","cod":"200","count":1,"list":[{"id":3096472,"name":"Katowice","coord":{"lon":19.02754,"lat":50.258419},"main":{"temp":-2,"pressure":1026,"humidity":63,"temp_min":-2,"temp_max":-2},"dt":1481639400,"wind":{"speed":3.6,"deg":210},"sys":{"country":"PL"},"clouds":{"all":0},"weather":[{"id":800,"main":"Clear","description":"Bezchmurnie","icon":"01d"}]}]}';
		
		$data=json_decode($data);
		eval("\$data=".$this->validate."?\$data:[];");  
		
		if(empty($data))
		  return array('dane'=>null,'data'=>$data);

		$dane = new Dane();
	    
		$longitude=$latitude=$citycode='';
	    
		foreach(explode("\n",$this->getMapping()) as $wiersz){
		  
		  $mapowanie[0]=substr($wiersz,0,$pos=strpos($wiersz,'='));
		  $mapowanie[1]=substr($wiersz,$pos+1);
		  
		  eval("\$pole={$mapowanie[1]};");
		  
		  switch($mapowanie[0]){
		    case 'latitude': $latitude=$pole;break;		    
		    case 'longitude': $longitude=$pole;break;
		    case 'citycode': $citycode=$pole;break;
		    case 'icon': $dane->setIcon($pole); break;
		    case 'temp': $dane->setTemp($pole); break;
		    case 'temp_min': $dane->setTempMin($pole); break;
		    case 'temp_max': $dane->setTempMax($pole); break;
		    case 'pressure': $dane->setPressure($pole); break;
		    case 'humidity': $dane->setHumidity($pole); break;
		    default: 
		  }
		}
		
		if($this->getIconurl())
		  $dane->setIconurl($this->getIconurl());
		  
		$dane->setCityName($cityname);
		
		return array('dane'=>$dane,'data'=>$data,'latitude'=>$latitude,'longitude'=>$longitude,'citycode'=>$citycode);
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
     * Set serviceName
     *
     * @param string $serviceName
     *
     * @return Uslugi
     */
    public function setServiceName($serviceName)
    {
        $this->service_name = $serviceName;

        return $this;
    }

    /**
     * Get serviceName
     *
     * @return string
     */
    public function getServiceName()
    {
        return $this->service_name;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Uslugi
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set post
     *
     * @param string $post
     *
     * @return Uslugi
     */
    public function setPost($post)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return string
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Uslugi
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set mapping
     *
     * @param string $mapping
     *
     * @return Uslugi
     */
    public function setMapping($mapping)
    {
        $this->mapping = $mapping;

        return $this;
    }

    /**
     * Get mapping
     *
     * @return string
     */
    public function getMapping()
    {
        return $this->mapping;
    }

    /**
     * Set iconurl
     *
     * @param string $iconurl
     *
     * @return Services
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

    /**
     * Set validate
     *
     * @param string $validate
     *
     * @return Services
     */
    public function setValidate($validate)
    {
        $this->validate = $validate;

        return $this;
    }

    /**
     * Get validate
     *
     * @return string
     */
    public function getValidate()
    {
        return $this->validate;
    }
}
