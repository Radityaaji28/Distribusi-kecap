<?php
function calculateTotal()
{
    $total = 0;
    $totalQuantity = 0;

    foreach ($_SESSION['cart'] as $item) {
        $total += $item['harga'] * $item['quantity'];
        $totalQuantity += $item['quantity'];
    }

    return ['total' => $total, 'totalQuantity' => $totalQuantity];
}
?>
