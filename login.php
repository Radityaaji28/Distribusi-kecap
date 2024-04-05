<!DOCTYPE html>
<html lang="en">

<head>
	<title>LOGIN</title>
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

				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-title">
						Member Login
					</span>

					<?php
					session_start();

					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						$username = $_POST["username"];
						$password = $_POST["password"];

						// Koneksi ke database
						$conn = new mysqli("localhost", "root", "", "distribusi_kecap");

						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}

						// Query ke database untuk memeriksa username dan password
						$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
						$result = $conn->query($query);

						if ($result->num_rows == 1) {
							$row = $result->fetch_assoc();

							// Simpan informasi pengguna dalam sesi
							$_SESSION["user_id"] = $row["id"];
							$_SESSION["username"] = $row["username"];
							$_SESSION["role"] = $row["role"];

							// Redirect ke halaman update sesuai peran pengguna
							if ($_SESSION["role"] === 'user') {
								header("Location: home.php");
							} elseif ($_SESSION["role"] === 'admin') {
								header("Location: update_admin.php");
							} elseif ($_SESSION["role"] === 'distributor') {
								header("Location: update_distributor.php");
							}
						} else {
							echo "Username atau Password salah.";
						}

						$conn->close();
					}
					?>

					<div class="wrap-input100 validate-input" data-validate="Valid Username is required: Ra***">
						<input class="input100" type="text" name="username" placeholder="Username" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user-circle-o" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="register.php">
							Buat Akunmu
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
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