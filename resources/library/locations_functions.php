<?php
/*
// **FUNCTIONS USED BY PAGE**
*/

function makeHeaderNumber() {
  global $lang, $phoneNumberEn, $phoneNumberJa;
  if($lang == "en") {
    return '<span class="tel_ontop"><a href="tel:'.$phoneNumberEn.'">+'.$phoneNumberEn.'</a></span>';
  } else {
    return '<span class="tel_ontop"><a href="tel:'.$phoneNumberJa.'">'.$phoneNumberJa.'</a></span>';
  }
}

function makeCityLinks( $cities, $lang )
{
	global $cities;

	$html = '';
	foreach($cities as $city) {
		$html .= '<li><a href="#'.$city->getCity().'" class="smooth">'.$city->getCityTranslated().' &raquo;</a></li>';
	}

	return $html;
}

function makeCities()
{
	global $cities;
	
	$html = '';
	// For each city
	foreach($cities as $city) {
		// print the header for the city
		$html .= '<h3 class="region-title" id="'.$city->getCity().'">'.$city->getCityTranslated().'</h3>
			<div class="row region-body">'
			. makeLocations( $city->getCity() ) .
			'</div>';
	}
	
	return $html;
}

function makeLocations( $cityName ) 
{
	global $locations, $lang;

	$html = '';
	// iterate through the locations with an iterative variable
	for($i = 0; $i < sizeof($locations[$cityName]); $i++) {
		// logic for left and right
		$side = ($i%2 == 0) ? "left" : "right"; 
		$location = LocationFactory::create($locations[$cityName][$i], $lang, $side, $cityName);
		$html .= $location->getLocationBox();
		// add clearfix if this is a right location
		if($side === "right")
		{
			$html .= '<div class="clearfix"></div>';
		}
	}
	
	return $html;
}

?>
