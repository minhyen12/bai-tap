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

			$err_arr = $this->validate($emai, $password);

			if(!empty($err_email)) {
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
		$err_arr = array();
		$regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i";
			//ktra mail
		if (empty($email)) {
			$err_arr['err_email'] = "Email không được để trống!";
		} else if (!preg_match($regex, $email)) {
			$err_arr['err_email'] = "Email không đúng định dạng!";
		} else if (strlen($email) > 255) {
			$err_arr['err_email'] = "Độ dài emai nhỏ hơn 255 ký tự!";
		}
		//kiem tra pass
		if (empty($password)) {
			$err_arr['err_password'] = "Password không được để trống!";
		} else if (!preg_match($regex_pass, $password)) {
			$err_arr['err_password'] = "Password có tối thiểu tám ký tự, ít nhất một chữ cái, một số và một ký tự đặc biệt!";
		}
		return $err_arr;
	}
}
?>