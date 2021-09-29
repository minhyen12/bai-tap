<?php 

class RegisterPdo
{

	private $conn;
	function __construct($conn)
	{
		$this->conn = $conn;
	}

	public function index()
	{
		require_once('register.php');
	}

	public function register()
	{
		$email = $name = $password = $passwordCf = $phone = $address = '';
		if (isset($_POST['submit'])) {
			$email = $_POST['email'];
			$name = $_POST['name'];
			$password = $_POST['password'];
			$passwordCf = $_POST['password_cf'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];

			$errArr = $this->validateField($email, $name, $password, $passwordCf, $phone, $address);

			if (!empty($errArr)) {
				require_once('register.php');
				return false;
			}
			$password = md5($password); 
			$sql = "INSERT INTO users (email, name, password, phone, address) VALUES (?, ?, ?, ?, ?)";

			$query = $this->conn->prepare($sql)->execute([$email, $name, $password, $phone, $address]);

			header('Location: login.php');
		}
	}

	protected function validateField($email, $name, $password, $password_cf, $phone, $address)
	{
		$errArr = array();
		$regexEmail = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i";
		$regexPass = "/(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8, 100}/";
				//ktra mail
		if (empty($email)) {
			$errArr['errEmail'] = "Email không được để trống!";
		} else if (!preg_match($regexEmail, $email)) {
			$errArr['errEmail'] = "Email không đúng định dạng!";
		} else if (strlen($email) > 255) {
			$errArr['errEmail'] = "Độ dài emai nhỏ hơn 255 ký tự!";
		}
				//ktra name
		if ($name == '') {
			$errArr['errName'] = "Name không được để trống!";
		} else if (strlen($name) < 6 || strlen($name) > 200) {
			$errArr['errName'] = "Độ dài tên từ 6 đến 200 ký tự!";
		}
				//kiem tra pass
		if (empty($password)) {
			$errArr['errPassword'] = "Password không được để trống!";
		} else if (!preg_match($regexPass, $password)) {
			$errArr['errPassword'] = "Password có tối thiểu tám ký tự, ít nhất một chữ cái, một số và một ký tự đặc biệt!";
		}
				//ktra conf pass
		if (empty($passwordCf)) {
			$errArr['errpasswordCf'] = "Password Confirm không được để trống!";
		} else if ($password != $passwordCf) {
			$errArr['errpasswordCf'] = "Password confirm chưa chính xác!";
		}
				// ktra phone
		if (strlen($phone) < 10 || strlen($phone) > 20) {
			$errArr['errPhone'] = "Độ dài số điện thoại từ 10-20";
		}
				// ktra address
		if (empty($address)) {
			$errArr['errAddress'] = "Address không được để trống!";
		}
		return $errArr;
	}
}
?>