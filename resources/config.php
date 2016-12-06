<?php

/*
  PATH CONSTANTS FOR CONVENIENCE
*/
defined("LIBRARY_PATH")
    or define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/library'));

defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));

/*
  ERROR REPORTING
*/
ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRCT);


/*
  OTHER GLOBALS
*/
// Months
$theMonthJa = date("n");
$theMonthEn = date("F");
// Phone numbers
$phoneNumberJa = "0120 8945 77";
$phoneNumberEn = "81 3 6269 3400";


/*
  CLASSES
*/
require_once(LIBRARY_PATH . "/City.php");
require_once(LIBRARY_PATH . "/Location.php");


/*
  LOAD LOCATION DATA
*/
$jsonString = file_get_contents(__ROOT__ . "/public_html/json/locations.json");
// decode location data
$locations = json_decode($jsonString, true);

// A list of all the cities
$cityNames = array_keys($locations);
function cityMapFunction($city) {
	global $lang;
	return CityFactory::create($city, $lang);
}
$cities = array_map("cityMapFunction", $cityNames);

// Locations with a VO Deal
$dealLocationsArr = array();
foreach ($locations as $city => $locationsArr) {
  foreach ($locationsArr as $location) {
    if($location['hasVoDeal']) {
      $location['city'] = $city;
      array_push($dealLocationsArr, $location);
    }
  }
}


/*
  LOGIC AND OTHER FUNCTIONALITY
*/
require_once(LIBRARY_PATH . "/locations_functions.php");
// logic specific to tokyo

// get cheapest price in osaka, see slider.php
$cheapestPrices = [];
// take commas out of string and make into int
function replaceCommasInt($numberStr) {
	return intval( str_replace(",", "", $numberStr) );
}
foreach ($locations['tokyo'] as $tokyoLocation) {
  $intPrices = array_map("replaceCommasInt", $tokyoLocation['voPrices']);
  array_push( $cheapestPrices, min($intPrices) );
}
$cheapestPrice = number_format(min($cheapestPrices));

?>
