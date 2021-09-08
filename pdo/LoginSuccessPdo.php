<?php 
session_start();
if (!isset($_SESSION['email'])) {
	header("location: login.php");
} else {
	echo "Welcome" . $_SESSION['email'] . "<br>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
	<title>Logout</title>
</head>
<body>
	<button type="submit" name="submit" class="btn btn-success"><a href="logout.php">Logout</a></button>
</body>
</html>