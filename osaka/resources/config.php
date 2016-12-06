<?php

/*
  PATH CONSTANTS FOR CONVENIENCE
*/
defined("LIBRARY_PATH")
    or define("LIBRARY_PATH", realpath(__ROOT__ . '/../resources/library'));

defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", realpath(__ROOT__ . '/../resources/templates'));

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
$phoneNumberJa = "0120 2540 77";
$phoneNumberEn = "81 6 6133 5800";


/*
  CLASSES
*/
require_once(LIBRARY_PATH . "/City.php");
require_once(LIBRARY_PATH . "/Location.php");

/*
  LOAD LOCATION DATA
*/
$jsonString = file_get_contents(__ROOT__ . "/../public_html/json/locations.json");
// decode location data
$locations = json_decode($jsonString, true);
// A list of all the cities
$cityNames = array_keys($locations);
function cityMapFunction($city) {
	global $lang;
	return CityFactory::create($city, $lang);
}
$cities = array_map("cityMapFunction", $cityNames);
//rearrange cities for osaka page
$cities = [ $cities[2],$cities[0],$cities[1],$cities[3],$cities[4] ];
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
// sort deal locations so that osaka comes first
function cmp($a, $b) {
  $name = $a['name'];

  if ($name == "Umeda Hilton Plaza West Office Tower" || $name == "Shinsaibashi Cartier Building" || $name == "Edobori Center Building") {
    return -1;
  } else {
    return 1;
  }
}
uasort($dealLocationsArr, 'cmp');

// get cheapest price in osaka, see slider.php
$cheapestPrices = [];
// take commas out of string and make into int
function replaceCommasInt($numberStr) {
	return intval( str_replace(",", "", $numberStr) );
}
foreach ($locations['osaka'] as $osakaLocation) {
  $intPrices = array_map("replaceCommasInt", $osakaLocation['voPrices']);
  array_push( $cheapestPrices, min($intPrices) );
}
$cheapestPrice = number_format(min($cheapestPrices));

?>
