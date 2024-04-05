<!doctype html>
<html lang="en">

<?php
include 'navbar.php';
include 'cart_aksi.php';
include 'checkout_hitung.php';
?>

<body>

	<div class="untree_co-section before-footer-section">
		<div class="container">
			<h2>Checkout</h2>

			<form action="" method="post">
				<!-- Table to display the list of products to be purchased -->
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Nama Produk</th>
							<th>Harga</th>
							<th>Jumlah</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($_SESSION['cart'] as $item) : ?>
							<tr>
								<td><?php echo $item['nama']; ?></td>
								<td>Rp <?php echo number_format($item['harga'], 2); ?></td>
								<td><?php echo $item['quantity']; ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>

				<!-- Display the total price and total quantity -->
				<p class="mb-3">Total Harga: Rp <?php echo number_format(calculateTotal()['total'], 2); ?></p>
				<p class="mb-3">Total Barang: <?php echo calculateTotal()['totalQuantity']; ?></p>

				<!-- Button to process checkout -->
				<a class="checkout-link btn btn-primary" name="checkout" href="checkout_action.php">Checkout</a>
			</form>
		</div>
	</div>


	<?php
	include 'footer.php';
	?>


	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/tiny-slider.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>