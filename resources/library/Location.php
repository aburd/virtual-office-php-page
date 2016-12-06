<?php
/*
  Factory pattern for making locations
*/

/*Location Class*/
class Location extends City
{
	private $lang;
	private $side;
//	private $city;
//	private $cityTranslated;
	private $name;
	private $url;
	private $locationCode;
	private $address;
	private $phoneNumber;
	private $hasVo;
	private $hasCo;
	private $newLocation;
	private $hasVoDeal;
	private $voPrices;
	private $voSpecialDeal;
	private $bestAddress;
	private $bestPrice;

	// for vospecial deal box
	private $productsEn = array('Virtual Office', 'Communications', 'Address', 'Meetings');
  private $productsJa = array('バーチャルオフィス', '電話秘書代行', '貸し住所', '貸会議室'); 

	public function __construct($locationObject, $lang, $side, $city)
	{
		// assign common variables for both languages 
		$this->locationCode 	= $locationObject['locationCode'];
		$this->hasVo 					= $locationObject['hasVo'];
		$this->hasCo 					= $locationObject['hasCo'];
		$this->newLocation 		= $locationObject['newLocation'];
		$this->hasVoDeal 			= $locationObject['hasVoDeal'];
		$this->voSpecialDeal 	= $locationObject['voSpecialDeal'];
		$this->voPrices 			= $locationObject['voPrices'];
		$this->url 						= $locationObject['url'];
		$this->bestAddress 		= $locationObject['bestAddress'];
		$this->bestPrice 			= $locationObject['bestPrice'];
		$this->lang 					= $lang;
		$this->side 					= $side;
		$this->city 					= $city;
		// assign different values based on language
		if($lang == "en") 
		{	
			$this->cityTranslated = $this->cityDictionaryEn[$city];
			$this->name = $locationObject['name'];
			$this->address = $locationObject['address'];
			$this->phoneNumber = "+81 " . $locationObject['phoneNumber'];	
		}
		else
		{
			$this->cityTranslated = $this->cityDictionaryJa[$city];
			$this->name = $locationObject['namae'];
			$this->address = $locationObject['jaAddress'];
			$this->phoneNumber = "0" . $locationObject['phoneNumber'];
		}
	}
	// makes an appropriate link for locations with and without VO
	private function getVoUrl()
	{ 
		return ( $this->hasVo )
			? "http://www.servcorp.co.jp/$this->lang/virtual-offices/locations/$this->city/$this->url/"
			: "http://www.coworking-ikebukuro.jp/";
	}
	// get appropriate image url based on relative path
	private function getImageUrl()
	{
		return ( $this->lang === "en")
			? "../public_html/images/locations/$this->url.jpg"
			: "./public_html/images/locations/$this->url.jpg";
		
	}
	// text to show when this location is new
	private function getNewLocationText()
	{
		if( $this->newLocation )
		{
			return $this->lang === "en" 
				? '<span class="blurb"> - Now open!</span>'
				: '<span class="blurb"> - 新規オープン！</span>';
		}
	}
	// text to show when this location is considered to be the best address within that city
	private function getBestAddressText()
	{
		if( $this->bestAddress )
		{
			return ($this->lang === "en") 
				? "<span class='blurb'>Best address in ".$this->cityTranslated."</span><br>"
				: "<span class='blurb'>".$this->cityTranslated."の一等地住所</span><br>";
		}
	}
	// text to show when this location has the best price
	private function getBestPriceText()
	{
		if( $this->bestPrice )
		{
			return ($this->lang === "en") 
				? "<span class='blurb'>Best price in ".$this->cityTranslated."</span><br>"
				: "<span class='blurb'>".$this->cityTranslated."のベストプライス</span><br>";
		}
	}
	// box to show when this is also a coworking location
	private function getCoworkingBox()
	{
		if($this->hasCo)
		{
			return ( $this->lang === "en")
				? <<<EOT
					<table>
						<tbody>
							<tr>
								<td><img src="../public_html/images/coworking-icon.png" style="padding-right: 5px; vertical-align:middle"></td>
								<td>Full time Coworking space now available!<br><a href="http://www.servcorp.co.jp/$this->lang/coworking/locations/$this->city/$this->url/" class="more" style="color: #503216;" target="_blank">More details ≫</a></td>
							</tr>
						</tbody>
					</table>
EOT
				: <<<EOT
					<table>
						<tbody>
							<tr>
								<td><img src="./public_html/images/coworking-icon.png" style="padding-right: 5px; vertical-align:middle"></td>
								<td>コワーキングスペースがご利用可能<br><a href="http://www.servcorp.co.jp/$this->lang/coworking/locations/$this->city/$this->url/" class="more" style="color: #503216;" target="_blank">詳細 ≫</a></td>
							</tr>
						</tbody>
					</table>
EOT;
		}
	}
	// define function to make a row for the price table
	private function makePriceRow($productName, $voPrice, $voDealPrice) {
		if($voDealPrice !== "0") {
			return '<tr>
				<td>' . $productName . '
					<span class="oldprice">' . $voPrice . '</span>
					<span class="newprice">' . $voDealPrice . '</span>
				</td>
			</tr>';
		} else {
			return '<tr>
				<td>' . $productName . '
					<span class="newprice">' . $voPrice . '</span>
				</td>
			</tr>';
		}
	}
	// for making a dealbox
	private function getVoDealBox() {
		global $theMonthJa, $theMonthEn;
		
		$priceRows = ''; // hold the rows
		$innerText = ''; // Title text in the box
		
		// Construct the price rows to be added to table, depends on language
		if($this->lang == "en") 
		{	
			$innerText = $theMonthEn . " Special!";
			for ($i = 0; $i < sizeof($this->voPrices); $i++) 
			{
				$priceRows .= $this->makePriceRow( $this->productsEn[$i], $this->voPrices[$i], $this->voSpecialDeal[$i] );
			}
		} 
		else 
		{
			$innerText = $theMonthJa . "月限定オファー";
			for ($i = 0; $i < sizeof($this->voPrices); $i++) 
			{
				$priceRows .= $this->makePriceRow( $this->productsJa[$i], $this->voPrices[$i], $this->voSpecialDeal[$i] );
			}
		}
		
		// Create the dealbox using the values above
		if( $this->hasVoDeal )
		{
			return <<<EOT
				<div class="promo">
					<strong>$innerText</strong>
					<div class="inner">
						<table>
							<tbody>
								$priceRows
							</tbody>
						</table>
					</div>
				</div>
EOT;
		}
	}
	
	// This makes the entire box which displays the location
	public function getLocationBox()
	{
		return <<<EOT
		<a id="$this->locationCode"></a>
		<div class="col-sm-6 location-inner $this->side">
			<div class="photo">
				<a target="_blank" href="{$this->getVoUrl()}"><img src="{$this->getImageUrl()}" alt="">
				</a>
			</div>
			<div class="content">
				<h4 class="title">
					<a target="_blank" href="{$this->getVoUrl()}">$this->name</a>
					{$this->getNewLocationText()}
				</h4>
				<p class="addr">$this->address<br>
					T <a class="phone" href="tel:$this->phoneNumber">$this->phoneNumber</a><br>
					{$this->getBestAddressText()}
					{$this->getBestPriceText()}
					{$this->getVoDealBox()}
					<a href="{$this->getVoUrl()}" class="more" target="”_blank”">詳細 »</a>
				</p>
				<br>{$this->getCoworkingBox()}
			</div>
			<div class="clearfix"></div>
		</div>
EOT;
	}
}


class LocationFactory
{
    public static function create($locationObject, $lang, $side, $city)
    {
        return new Location($locationObject, $lang, $side, $city);
    }
}

?>
