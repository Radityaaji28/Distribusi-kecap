<?php
session_start();

// Pengecekan apakah pengguna telah login sebagai "user"
if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "user") {
    header("Location: index.php");
    exit();
}

// Pengecekan metode permintaan
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Mengambil data dari formulir
    $email = $_POST["email"];
    $alamat = $_POST["alamat"];
    $no_telp = $_POST["no_telp"];

    // Koneksi ke database
    $conn = new mysqli("localhost", "root", "", "distribusi_kecap");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepared statement untuk menghindari SQL injection
    $user_id = $_SESSION["user_id"];
    $update_query = $conn->prepare("UPDATE user SET email=?, alamat=?, no_telp=? WHERE id=?");
    $update_query->bind_param("sssi", $email, $alamat, $no_telp, $user_id);

    if ($update_query->execute()) {
        echo "Update successful";
    } else {
        echo "Error updating record: " . $update_query->error;
    }

    // Menutup koneksi dan statement
    $update_query->close();
    $conn->close();
} else {
    // Jika permintaan tidak melalui metode POST, redirect ke halaman update_user.php
    header("Location: update_user.php");
    exit();
}
?>
