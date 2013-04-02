<?php
namespace API;

require 'weather.php';

use Weather\WeatherParser as WeatherParser;


$t = new WeatherParser();
$t->getWeather('宜山路');
/**
 * the weather service api
 * @author liyajie1209
 *
 */
class Api {
	
	/**
	 * get the weather dependcy the location of the current user
	 * @param $lantitud string
	 * @param $longitud string
	 */
	public function getWeatherByLocation($lantitud,$longitud) {
		
	}
	
	
	/**
	 * get weather by the specify address
	 * @param string $cityName
	 */
	public function  getWeather($address) {
		
	}
	
	
}