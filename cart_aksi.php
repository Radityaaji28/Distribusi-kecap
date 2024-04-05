<?php
session_start();
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $koneksi->query("SELECT * FROM produk WHERE id = $id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // Check if the item is already in the cart
        $found = false;
        foreach ($_SESSION['cart'] as &$cartItem) {
            if ($cartItem['id'] == $row['id']) {
                $cartItem['quantity'] += 1; // Increase quantity if item exists
                $found = true;
                break;
            }
        }

        // If the item is not in the cart, add it
        if (!$found) {
            $cartItem = array(
                'id' => $row['id'],
                'nama' => $row['nama'],
                'harga' => $row['harga'],
                'quantity' => 1, // Set initial quantity to 1
            );

            array_push($_SESSION['cart'], $cartItem);
        }

        header("Location: cart.php");
    }
}
