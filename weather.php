<?php
namespace Weather;

/**
 * net work request
 * @author liyajie1209
 *
 */
final class WeatherParser {
	
	
	const LOCATION_URL = "http://maps.googleapis.com/maps/api/geocode/json?address=";

	//31.1861720,121.4274140
	const LOCATION_REVERSE = "http://maps.googleapis.com/maps/api/geocode/json?latlng=";
	const SENSOR = "&sensor=true";
	/**
	 * @param unknown_type $lan
	 * @param unknown_type $long
	 */
	public final function requestLocationService($lan,$long) {
		
	} 
	
	public function getWeather($address) {
		$url = $this->constuctURL($address);
		$response = $this->request($url);
	}
	
	/**
	 * @param unknown_type $param
	 * @param unknown_type $type
	 * @return string
	 */
	private function constuctURL($param='',$type=1) {
	    $url = '';
		if ($type == 1) {
			$url = WeatherParser::LOCATION_URL.$param.WeatherParser::SENSOR;
		} elseif ($type == 2) {
			$url = WeatherParser::LOCATION_REVERSE.$param.WeatherParser::SENSOR;
		}
		return $url;
	}
	
	private function request($url) {
		$curl = curl_init($url);
		$options = array(CURLOPT_URL=>$url,
				CURLOPT_RETURNTRANSFER=>1,
				CURLOPT_USERAGENT=>"ApiToken");
		curl_setopt_array($curl, $options);
		$response = curl_exec($curl);
		if(!$response) {
			die('Error:'.curl_error($curl).'errorcode:'.curl_errno($curl));
		}
		print $response;
	}
}
?>