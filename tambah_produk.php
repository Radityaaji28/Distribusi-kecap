<?php
// Koneksi ke database (sesuaikan dengan konfigurasi Anda)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "distribusi_kecap"; // Sesuaikan dengan nama database Anda
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

// Ambil data dari formulir
$nama = $_POST['nama'];
$harga = $_POST['harga'];

// Proses upload image
$image = $_FILES['image']['nama'];
$image_tmp = $_FILES['image']['tmp_name'];
$image_path = "uploads/" . $image; // Folder tempat menyimpan image

move_uploaded_file($image_tmp, $image_path);

// Query untuk menambahkan produk ke database
$sql = "INSERT INTO produk (nama, harga, image) VALUES ('$nama', '$harga', '$image_path')";

if ($conn->query($sql) === TRUE) {
    echo "Produk berhasil ditambahkan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Produk</title>
</head>
<body>
    <h2>Form Tambah Produk</h2>
    <form action="proses_tambah_produk.php" method="post" enctype="multipart/form-data">
        <label for="nama">Nama Produk:</label>
        <input type="text" name="nama" required><br>

        <label for="harga">Harga:</label>
        <input type="number" name="harga" required><br>

        <label for="image">image:</label>
        <input type="file" name="image" accept="image/*" required><br>

        <input type="submit" value="Tambah Produk">
    </form>
</body>
</html>
