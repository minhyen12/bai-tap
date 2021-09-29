<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
	<!-- <script type="text/javascript" src="../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script> -->
</head>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="card col-lg-8 m-auto p-0">
				<div class="card-header">
					Login Form
				</div>
				<div class="card-body">
					<form action="index.php?mod=login&&act=store" method="POST" role="form">
						
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" class="form-control" id="email" name="email" placeholder="Email">
							<?php if (!empty($errArr['errEmail'])): ?>
								<span class="text-danger">
									<?php echo $errArr['errEmail'] ?>
								</span>
							<?php endif ?>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="password">
							<?php if (!empty($errArr['errPassword'])): ?>
								<span class="text-danger">
									<?php echo $errArr['errPassword'] ?>
								</span>
							<?php endif ?>
						</div>
						
						<div class="form-group">
							<label for="remember_me">Remember Me</label> 
							<input type="checkbox" name="remember_me" id="remember_me">
						</div>
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<button type="submit" name="submit" value="submit" class="btn btn-primary">Login </button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>