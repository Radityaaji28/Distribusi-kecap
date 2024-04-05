<?php
// Start the session
session_start();

// Process the checkout (you can add more logic here if needed)

// Unset the cart to remove items
unset($_SESSION['cart']);

// Redirect to the thank you page
header("Location: thankyou.php");
exit(); // Ensure that no further code is executed after the redirect
?>
