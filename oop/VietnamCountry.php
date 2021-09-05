<?php 
require_once('Country.php');
require_once('Boss.php');
require_once('Active.php');

class VietnamCountry extends Country implements Boss
{
	use Active;

	public function sayHello()
	{
		echo 'Xin chao';
	}
	public function checkValidSlogan($str, $word1, $word2) {
		if(stripos($str, $word1) !== false && stripos($str, $word2) !== false) {
			return true;
		}
		return false;
	}
	public function defindYourSelf() {
		return 'I am '. get_class($this);
	}
}
$vietnamCountry = new VietnamCountry();
$vietnamCountry->setSlogan('Vietnam is the easternmost country on the Indochina Peninsula. With an estimated 94.6 million inhabitants as of 2016, it is the 15th most populous country in the world.');
$vietnamCountry->sayHello(); // Xin chao
$test = $vietnamCountry->getSlogan();
echo "<br>";
var_dump($vietnamCountry->checkValidSlogan($test, 'vietnam', 'hust')); // false
echo "<br>";
echo $vietnamCountry->defindYourSelf();
 ?>