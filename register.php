<!DOCTYPE html>
<html lang="en">

<head>
	<title>REGISTER</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<?php
				session_start();
				include 'koneksi.php';

				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$username = $_POST['username'];
					$email = $_POST['email'];
					$alamat = $_POST['alamat'];
					$no_telp = $_POST['no_telp'];
					$password = $_POST['password'];
					$role = $_POST['role'];

					$query = "INSERT INTO user (username, email, alamat, no_telp, password, role) VALUES ('$username', '$email', '$alamat', '$no_telp', '$password', '$role')";
					$result = $koneksi->query($query);

					if ($result) {
						header("location: login.php");
						exit();
					} else {
						$error = "Registrasi gagal. Silakan coba lagi.";
					}
				}
				?>

				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-title">
						Member Register
					</span>

					<?php if (isset($error)) {
						echo "<p class='error'>$error</p>";
					} ?>

					<div class="wrap-input100 validate-input" data-validate="Valid Username is required: Ra***">
						<input class="input100" type="text" name="username" placeholder="Username" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user-circle-o" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="email" placeholder="Email" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Alamat is required">
						<input class="input100" type="text" name="alamat" placeholder="Alamat" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-home" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Nomer is required">
						<input class="input100" type="text" name="no_telp" placeholder="Nomer Telfon" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Role is required: User">
						<select class="input100" name="role" required>
							<option value="user">User</option>
							<option value="admin">Admin</option>
							<option value="distributor">Distributor</option>
						</select>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-address-book" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Daftar
						</button>
					</div>

					<div class="text-center p-t-136">
						<p>Sudah Punya Akun? <a href="login.php">Login Disini</a></p>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="js/main.js"></script>
</body>

</html>