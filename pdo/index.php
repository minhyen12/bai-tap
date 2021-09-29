<?php 
require_once('Connection.php');
	
	$conn = Connection::startConnect();
	$mod = 'register';
	$act = 'index';

	if ($_GET['mod'] && $_GET['act']) {
		$mod = $_GET['mod'];
		$act = $_GET['act'];
	}

	switch ($mod) {
		case 'register':
			require_once('RegisterPdo.php');
			$registerController = new RegisterPdo($conn);
			switch ($act) {
				case 'index':
					$registerController->index();
					break;
				
				case 'store':
					$registerController->register();
					# code...
					break;
			}
			break;
		case 'login':
			require_once('LoginPdo.php');
			$loginController = new LoginPdo($conn);
			switch ($act) {
				case 'index':
					$loginController->index();
					break;
				
				case 'store':
					$loginController->login();
					break;
			}
		default:
			# code...
			break;
	}
?>