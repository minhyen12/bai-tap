<?php
class Connection
{
	public function startConnect() 
	{
		$username = "sampleUser";
		$password = "password";
		try {
			$conn = new PDO("mysql:host=db; dbname=sampleDB; charset=utf8", $username, $password);
			return $conn;
		}
		// Catch any errors
		catch (PDOException $e) {
			echo "Loi ket noi CSDL". $e->getMessage();
		}
	}
}


?>