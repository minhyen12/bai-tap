<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
	<!-- <script type="text/javascript" src="../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script> -->
</head>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="card col-lg-8 m-auto p-0">
				<div class="card-header">
					Register Form
				</div>
				<div class="card-body">
					<form action="index.php?mod=register&&act=store" method="POST" role="form">
						
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" class="form-control" id="email" name="email" placeholder="Email">
							<?php if (!empty($err_arr['err_email'])): ?>
								<span class="text-danger">
									<?php echo $err_arr['err_email'] ?>
								</span>
							<?php endif ?>
						</div>
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="name">
							<?php if (!empty($err_arr['err_name'])): ?>
								<span class="text-danger">
									<?php echo $err_arr['err_name'] ?>
								</span>
							<?php endif ?>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="password">
							<?php if (!empty($err_arr['err_password'])): ?>
								<span class="text-danger">
									<?php echo $err_arr['err_password'] ?>
								</span>
							<?php endif ?>
						</div>
						<div class="form-group">
							<label for="password_cf">Password confirm</label>
							<input type="password" class="form-control" id="password_cf" name="password_cf" placeholder="Password confirm">
							<?php if (!empty($err_arr['err_password_cf'])): ?>
								<span class="text-danger">
									<?php echo $err_arr['err_password_cf'] ?>
								</span>
							<?php endif ?>
						</div>
						<div class="form-group">
							<label for="phone">Phone</label>
							<input type="number" class="form-control" id="phone" name="phone" placeholder="phone">
							<?php if (!empty($err_arr['err_phone'])): ?>
								<span class="text-danger">
									<?php echo $err_arr['err_phone'] ?>
								</span>
							<?php endif ?>
						</div>
						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" class="form-control" id="address" name="address" placeholder="address">
							<?php if (!empty($err_arr['err_address'])): ?>
								<span class="text-danger">
									<?php echo $err_arr['err_address'] ?>
								</span>
							<?php endif ?>
						</div>
						<div class="form-group">
							<label for="remember_me">Remember Me</label> 
							<input type="checkbox" name="remember_me" id="remember_me">
						</div>
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<button type="submit" name="submit" value="submit" class="btn btn-primary">Register </button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>