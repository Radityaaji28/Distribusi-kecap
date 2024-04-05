<!doctype html>
<html lang="en">

<?php
session_start();
include 'navbar.php';

// Pemotongan bagian koneksi
$conn = new mysqli("localhost", "root", "", "distribusi_kecap");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Pemotongan bagian pengecekan login
if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "user") {
	header("Location: index.php");
	exit();
}

// Mendapatkan data pengguna dari database
$user_id = $_SESSION["user_id"];
$select_query = "SELECT * FROM user WHERE id=$user_id";
$result = $conn->query($select_query);

// Memeriksa apakah data ditemukan
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$email_previous = $row["email"];
	$alamat_previous = $row["alamat"];
	$no_telp_previous = $row["no_telp"];
} else {
	echo "Error: User data not found";
	exit();
}

// Inisialisasi variabel alert
$update_status = '';

// Di sini, Anda dapat menampilkan informasi pengguna dan formulir update sesuai kebutuhan
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	// Pemotongan bagian pemrosesan formulir update
	$email = $_POST["email"];
	$alamat = $_POST["alamat"];
	$no_telp = $_POST["no_telp"];

	// Pemotongan query update sesuai dengan kolom yang ingin diupdate
	$update_query = "UPDATE user SET email='$email', alamat='$alamat', no_telp='$no_telp' WHERE id=$user_id";

	if ($conn->query($update_query) === TRUE) {
		$update_status = 'success';
	} else {
		$update_status = 'error';
	}
}

?>

<body style="background-color: #ffffff;">

	<div class="container mt-5">
		<div class="update-container p-4 rounded" style="background-color: #ffffff; border: 1px solid #dddddd; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">

			<h2 class="mb-4 text-center">Halo, <?php echo $_SESSION["username"]; ?>!</h2>
			<p class="lead mb-4 text-center">Perbaharui Datamu:</p>
			<!-- Tampilkan alert sesuai dengan kondisi -->
			<?php if ($update_status === 'success'): ?>
				<div class="alert alert-success text-center" role="alert">
					Pembaruan sukses!
				</div>
			<?php elseif ($update_status === 'error'): ?>
				<div class="alert alert-danger text-center" role="alert">
					Error dalam memperbarui. coba lagi.
				</div>
			<?php endif; ?>
			

			<!-- Formulir update sesuai kebutuhan -->
			<form method="post" action="">
				<div class="mb-3">
					<label for="email" class="form-label">Email:</label>
					<input type="email" id="email" name="email" class="form-control" value="<?php echo $email_previous; ?>" required>
				</div>

				<div class="mb-3">
					<label for="alamat" class="form-label">Alamat:</label>
					<input type="text" id="alamat" name="alamat" class="form-control" value="<?php echo $alamat_previous; ?>" required>
				</div>

				<div class="mb-3">
					<label for="no_telp" class="form-label">Nomor Telepon:</label>
					<input type="text" id="no_telp" name="no_telp" class="form-control" value="<?php echo $no_telp_previous; ?>" required>
				</div>

				<button type="submit" class="btn btn-primary">Update</button>
			</form>

			<p class="mt-4 text-center"><a href="login.php" class="btn btn-danger">Logout</a></p>
		</div>
	</div>
</body>

<?php include 'footer.php'; ?>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/tiny-slider.js"></script>
<script src="js/custom.js"></script>

</html>