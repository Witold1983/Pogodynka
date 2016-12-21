<?php

/**
 * Klasa do prostego uzyskiwania informacji za pomocą API Open Weather Map
 * Filip Klar 2013
 */

namespace AppBundle\Controller;

 function get_error_code(\PDOException $e) {
    $message = $e -> getMessage();
    $matches = array();
    $code = preg_match('/ (\d\d\d\d) / ', $message, $matches);
    return $code;
 }
   
class Weather {

	public $name;
	public $icon;
	public $temp_min;
	public $temp_max;
	public $pressure;
	public $rain;
	public $wind;
	public $humidity;
	public $clouds;

	public function __construct($city) {
	
		$url = 'http://api.openweathermap.org/data/2.5/find?q='.$city.'&lang=pl&units=metric&mode=json&APPID=4a9afcc281cc3c2f51e50761a0a83e48';
		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HEADER, false);
		$data = curl_exec($curl);
		curl_close($curl);
		
		if($data == '')
		  return false;
		  
		$weather = json_decode($data);
		
		$this->name=$url.print_r($weather,true);
		
		$weather = $weather->list[0];
		
		if(property_exists($weather, 'rain')){
		  $weather->rain = (array) $weather->rain;
		  $this->rain = $weather->rain['3h'].' mm';
		}else
		  $this->rain =print_r($weather,true);
		  
		//$this->name = $city;
		$this->icon = 'http://openweathermap.org/img/w/'.$weather->weather[0]->icon.'.png';
		$this->temp_min = round($weather->main->temp_min-273.15, 1).' °C';
		$this->temp_max = round($weather->main->temp_max-273.15, 1).' °C';
		$this->pressure = round($weather->main->pressure, 1).' hPa';
		$this->wind = round($weather->wind->speed, 1).' m/s';
		$this->humidity = round($weather->main->humidity, 1).' %';
		$this->clouds = round($weather->clouds->all, 1).' %';
		
	}

}

?>