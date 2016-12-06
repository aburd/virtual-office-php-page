<?php
/*
  Factory pattern for making regions
*/
/*Region Class*/
class City
{
	private $city;
	private $cityTranslated;
	// dictionaries to translate name value to readable format
	protected $cityDictionaryEn = array(
		'tokyo' => "Tokyo",
		'yokohama' => "Yokohama",
		'osaka' => "Osaka",
		'nagoya' => "Nagoya",
		'fukuoka' => "Fukuoka"
	);
	protected $cityDictionaryJa = array(
		'tokyo' => "東京",
		'yokohama' => "横浜",
		'osaka' => "大阪",
		'nagoya' => "名古屋",
		'fukuoka' => "福岡"
	);
	
	public function __construct( $city, $lang ) 
	{
		$this->city	= $city;
		// translate based on language passed in
		$this->cityTranslated = $lang === "en"
			? $this->cityDictionaryEn[$city]
			: $this->cityDictionaryJa[$city];
	}
	
	public function getCityTranslated() 
	{
		return $this->cityTranslated;
	}
	
	public function getCity() 
	{
		return $this->city;
	}
	
}


class CityFactory
{
    public static function create( $city, $lang )
    {
        return new City( $city, $lang );
    }
}

?>