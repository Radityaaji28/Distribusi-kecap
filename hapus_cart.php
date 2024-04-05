<?php
session_start();

// Ambil indeks item dari URL
if (isset($_GET['index'])) {
    $index = $_GET['index'];

    // Cek apakah keranjang belanja ada dalam sesi
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        // Jika ditemukan, hapus produk dari keranjang berdasarkan indeks
        if (isset($_SESSION['cart'][$index])) {
            unset($_SESSION['cart'][$index]);
        }
    }
}

// Alihkan kembali ke halaman keranjang
header("Location: cart.php");
exit();
?>
