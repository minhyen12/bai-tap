<?php 
class ExerciseString 
{
	protected $check1;
	protected $check2;

	public function readFile($fileName)
	{
		$myFile = fopen($fileName, 'r');
		$connect = fread($myFile, filesize($fileName));
		fclose($myFile); 
		return $connect ;
	}
	public function checkValidString($str, $trueWord, $falseWord)
	{
		$count = $this->countStr($str);
		$result = false;
		if (strpos($str, $trueWord) && !strpos($str, $falseWord)) {
			$result = true;
		}
		return [
			'result' => $result,
			'count' => $count
		];
	}
	public function countStr($str) 
	{
		$strArr = explode(".", $str); 
		$count = count($strArr); 
		foreach ($strArr as $item) {
			if (empty($item) && $count > 0) {
				$count--;
			}
		}
		return $count;
	}
	public function writeFile($fileName, $checkResult1, $checkResult2)
	{
		$text1 = $text2 = "Chuỗi không hợp lệ.\n";
		if ($checkResult1['result']) {
			$text1 = "Chuỗi hợp lệ.\n";
		}
		if ($checkResult2['result']) {
			$text2 = "Chuỗi hợp lệ.\n";
		}
		$text2 .= "Số câu trong chuỗi là: ".$checkResult2['count'];
		$wfile = file_put_contents($fileName, $text1.$text2);

		echo "ghi file thành công<br>";
		return true;
	}
}
$object1 = new ExerciseString();
$str1 = $object1->readfile('file1.txt');
$str2 = $object1->readfile('file2.txt');
$check1 = $object1->checkValidString($str1, 'book', 'restaurant');
$check2 = $object1->checkValidString($str2, 'book', 'restaurant');
$object1->writeFile('result.txt', $check1, $check2);
?>