<?php 
session_start();

class LoginPdo 
{
	private $conn ;
	function __construct($conn)
	{
		$this->conn = $conn;
	}
	public function index()
	{
		require_once('LoginPdo.php');
	}
	public function login()
	{
		$email = $password = '' ;
		if(isset($_POST['submit'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];

			$errArr = $this->validate($emai, $password);

			if(!empty($errEmail)) {
				require_once('login.php');
				return false;
			}
			$password = md5($password);
			$sql = "SELECT * FROM users WHERE email = '". $email ."' AND password = '". $password ."'";

			$res = $this->conn->query($sql)->fetch(PDO::FETCH_OBJ);
			if($res == true) {
				$_SESSION['email'] = $email ;
				echo "Đăng nhập thành công";
			} else {
				echo "Đăng nhập thất bại";
			}

		}
	}
	public function validate($emai, $password)
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
		//kiem tra pass
		if (empty($password)) {
			$errArr['errPassword'] = "Password không được để trống!";
		} else if (!preg_match($regexPass, $password)) {
			$errArr['errPassword'] = "Password có tối thiểu tám ký tự, ít nhất một chữ cái, một số và một ký tự đặc biệt!";
		}
		return $errArr;
	}
}
?>