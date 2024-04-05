<!doctype html>
<html lang="en">

<?php
session_start();
?>

<style>
	.cart-table {
		margin-top: 20px;
	}

	.cart {
		width: 100%;
		border-collapse: collapse;
		margin-top: 10px;
	}

	.cart th,
	.cart td {
		padding: 10px;
		border: 1px solid #ddd;
		text-align: left;
	}

	.cart th {
		background-color: #f2f2f2;
	}

	.remove-link {
		color: red;
		text-decoration: underline;
		cursor: pointer;
	}

	.back-link {
		display: block;
		margin-top: 10px;
		color: #007bff;
		text-decoration: none;
		font-weight: bold;
	}

	.back-link:hover {
		text-decoration: underline;
	}

	.checkout-link {
		display: inline-block;
		padding: 10px 20px;
		background-color: #57b846;
		color: #fff;
		text-decoration: none;
		border-radius: 5px;
		transition: background-color 0.3s ease;
	}

	.checkout-link:hover {
		background-color: #333;
	}
</style>

<?php
include 'navbar.php';
?>

<body>
	<div class="untree_co-section before-footer-section">
		<div class="container">
			<h2>Keranjang</h2>
			<div class="cart-table">
				<?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) : ?>
					<table class="cart">
						<tr>
							<th>Nama Produk</th>
							<th>Harga</th>
							<th>Jumlah</th>
							<th>Aksi</th>
						</tr>
						<?php foreach ($_SESSION['cart'] as $index => $item) : ?>
							<tr>
								<td><?php echo $item['nama']; ?></td>
								<td>Rp <?php echo number_format($item['harga'], 2); ?></td>
								<td>
									<input type="number" name="quantity[<?php echo $index; ?>]" value="<?php echo $item['quantity']; ?>" min="1">
								</td>
								<td><a class="remove-link btn btn-danger" href="hapus_cart.php?index=<?php echo $index; ?>">Hapus</a></td>
							</tr>
						<?php endforeach; ?>
					</table>
					<br>
					<!-- Tambahkan button Checkout -->
					<a class="checkout-link btn btn-primary" name="checkout" href="checkout.php">Checkout</a>
				<?php else : ?>
					<p>Keranjang kosong</p>
				<?php endif; ?>
				<br>
				<a class="back-link" href="home.php">Kembali ke Produk</a>
			</div>
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