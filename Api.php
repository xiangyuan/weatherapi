<?php
namespace API;

require 'weather.php';

use Weather\WeatherParser as WeatherParser;

/**
 * the weather service api
 * @author liyajie1209
 *
 */
class Api {

    private $weath = null;

    function __construct() {
        $this->weath = new WeatherParser();
    }
	/**
	 * get the weather dependcy the location of the current user
	 * @param $lantitud string
	 * @param $longitud string
	 */
	public function getWeatherByLocation($lantitud,$longitud) {
        $r = $this->weath->requestLocationService($lantitud,$longitud);
        print $r;
        return $r;
	}
	
	
	/**
	 * get weather by the specify address
	 * @param string $cityName
	 */
	public function  getWeather($address) {
		$r = $this->weath->getWeather($address);
        print $r;
        return $r;
	}
}

$t = new Api();
//$t->getWeather('宜山路');
$t->getWeatherByLocation('31.1875209802915','121.4287629802915');