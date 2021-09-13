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
		$email = $name = $password = $password_cf = $phone = $address = '';
		if (isset($_POST['submit'])) {
			$email = $_POST['email'];
			$name = $_POST['name'];
			$password = $_POST['password'];
			$password_cf = $_POST['password_cf'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];

			$err_arr = $this->validateField($email, $name, $password, $password_cf, $phone, $address);

			if (!empty($err_arr)) {
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
		$err_arr = array();
		$regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i";
		$regex_pass = "/(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8, 100}/";
				//ktra mail
		if (empty($email)) {
			$err_arr['err_email'] = "Email không được để trống!";
		} else if (!preg_match($regex, $email)) {
			$err_arr['err_email'] = "Email không đúng định dạng!";
		} else if (strlen($email) > 255) {
			$err_arr['err_email'] = "Độ dài emai nhỏ hơn 255 ký tự!";
		}
				//ktra name
		if ($name == '') {
			$err_arr['err_name'] = "Name không được để trống!";
		} else if (strlen($name) < 6 || strlen($name) > 200) {
			$err_arr['err_name'] = "Độ dài tên từ 6 đến 200 ký tự!";
		}
				//kiem tra pass
		if (empty($password)) {
			$err_arr['err_password'] = "Password không được để trống!";
		} else if (!preg_match($regex_pass, $password)) {
			$err_arr['err_password'] = "Password có tối thiểu tám ký tự, ít nhất một chữ cái, một số và một ký tự đặc biệt!";
		}
				//ktra conf pass
		if (empty($password_cf)) {
			$err_arr['err_password_cf'] = "Password Confirm không được để trống!";
		} else if ($password != $password_cf) {
			$err_arr['err_password_cf'] = "Password confirm chưa chính xác!";
		}
				// ktra phone
		if (strlen($phone) < 10 || strlen($phone) > 20) {
			$err_arr['err_phone'] = "Độ dài số điện thoại từ 10-20";
		}
				// ktra address
		if (empty($address)) {
			$err_arr['err_address'] = "Address không được để trống!";
		}
		return $err_arr;
	}
}
?>