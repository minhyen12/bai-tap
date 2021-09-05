<?php 
require_once('Country.php');
require_once('Boss.php');
require_once('Active.php');

class EnglandCountry extends Country implements Boss
{
	use Active;
	
	public function sayHello()
	{
		echo 'hello';
	}
	public function checkValidSlogan($str, $word1, $word2) {
		if(stripos($str, $word1) !== false || stripos($str, $word2) !== false) {
			return true;
		}
		return false;
	}
	public function defindYourSelf()
	{
		return 'I am '. get_class($this);
	}
}
$englandCountry = new EnglandCountry();
$englandCountry->setSlogan('England is a country that is part of the United Kingdom. It shares land borders with Wales to the west and Scotland to the north. The Irish Sea lies west of England and the Celtic Sea to the southwest.');
$test = $englandCountry->getSlogan();
$englandCountry->sayHello(); // Hello
echo "<br>";
var_dump($englandCountry->checkValidSlogan($test, 'england', 'english')); // true
echo "<br>";
echo $englandCountry->defindYourSelf();
/*var_dump($englandCountry->getSlogan());*/ // true

 ?>