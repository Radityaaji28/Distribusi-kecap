<!DOCTYPE html>
<html lang="en">

<style>
  .product-item {
    border: 0px solid #ccc;
    padding: 10px;
    margin: 20px;
    width: 250px;
    float: left;
    text-align: center;
  }

  .product-image {
    max-width: 100%;
  }

  .product-name {
    margin-top: 10px;
    font-size: 18px;
  }

  .product-price {
    font-weight: bold;
    color: #e44d26;
    /* warna harga, sesuaikan dengan desain Anda */
  }

  .btn-add-to-cart {
    display: block;
    margin-top: 10px;
    padding: 8px 15px;
    background-color: #28a745;
    /* warna tombol, sesuaikan dengan desain Anda */
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
  }

  .btn-add-to-cart:hover {
    background-color: #218838;
    /* warna tombol saat dihover, sesuaikan dengan desain Anda */
  }
</style>


<?php
include 'navbar.php';
?>

<!-- Start Hero Section -->
<div class="hero">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-5">
        <div class="intro-excerpt">
          <h1>KECAP <span clsas="d-block">DENGAN BAHAN ALAMI</span></h1>
          <p class="mb-4"> Rasakan kelezatan yang tak terlupakan dengan Kecap Bentul! Ciptakan cita rasa istimewa dalam setiap masakan Anda. Kecap Bentul, pilihan terbaik untuk kelezatan yang menggoda!</p>
          <p>
            <a href="cart.php" class="btn btn-primary me-2">Keranjang</a>
          </p>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="hero-img-wrap">
          <img src="images/kedelai.png" class="img-fluid col-lg-12" />
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Hero Section -->

<!-- Start Product Section -->
<div class="product-section">
  <div class="container">
    <div class="row">
      <!-- Start Column 1 -->
      <div class="col-md-3 mb-5 mb-md-0">
        <h2 class="mb-4 section-title">Berbagai Macam Kemasan</h2>
        <p class="mb-4">
          Terjaga kualitasnya serta dibuat dengan ketelitian sehingga terjaga kebersihan dan kehigienisan produk.
        </p>
      </div>
      <!-- End Column 1 -->

      <!-- Start Column 2 -->
      <?php
      include 'koneksi.php';

      $result = $koneksi->query("SELECT * FROM produk");
      ?>

      <div class="col-md-9">
        <div class="row">
          <?php while ($row = $result->fetch_assoc()) : ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="product-item">
                <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['nama']; ?>" class="product-image">
                <h3 class="product-name"><?php echo $row['nama']; ?></h3>
                <p class="product-price">Rp <?php echo number_format($row['harga'], 2); ?></p>
                <a href="cart_aksi.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn btn-add-to-cart">Tambah ke Keranjang</a>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
      <!-- End Column 2 -->
    </div>
  </div>
</div>


<!-- End Product Section -->

<!-- Start Why Choose Us Section -->
<div class="why-choose-section">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-6">
        <h2 class="section-title">Kelebihan Dalam Membeli Kecap bentul</h2>
        <p>
          Ada banyak kelebihan jika anda berbelanja produk kami...
        </p>

        <div class="row my-5">
          <div class="col-6 col-md-6">
            <div class="feature">
              <div class="icon">
                <img src="images/truck.svg" alt="Image" class="imf-fluid" />
              </div>
              <h3>Gratis Ongkir</h3>
              <p>
                Gratis Ongkir untuk wilayah cilacap dan banyumas.
              </p>
            </div>
          </div>

          <div class="col-6 col-md-6">
            <div class="feature">
              <div class="icon">
                <img src="images/bag.svg" alt="Image" class="imf-fluid" />
              </div>
              <h3>Mudah Dalam Berbelanja</h3>
              <p>
                Dibuat agar memudahkan konsumen untuk memesan produk kami.
              </p>
            </div>
          </div>

          <div class="col-6 col-md-6">
            <div class="feature">
              <div class="icon">
                <img src="images/support.svg" alt="Image" class="imf-fluid" />
              </div>
              <h3>24/7 Support</h3>
              <p>
                Sistem bekerja 24 jam untuk meminimalisir kesalahan dalam transaksi.
              </p>
            </div>
          </div>

          <div class="col-6 col-md-6">
            <div class="feature">
              <div class="icon">
                <img src="images/return.svg" alt="Image" class="imf-fluid" />
              </div>
              <h3>Gratis Pengembalian</h3>
              <p>
                Jika produk ada kecacatan maka garansi uang kembali dan pengambilan produk secara gratis.
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="img-wrap">
          <img src="images/kedelai hitam.jpg" alt="Image" class="img-fluid" />
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Why Choose Us Section -->

<!-- Start Testimonial Slider -->
<div class="testimonial-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 mx-auto text-center">
        <h2 class="section-title">Testimoni</h2>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="testimonial-slider-wrap text-center">
          <div id="testimonial-nav">
            <span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
            <span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
          </div>

          <div class="testimonial-slider">
            <div class="item">
              <div class="row justify-content-center">
                <div class="col-lg-8 mx-auto">
                  <div class="testimonial-block text-center">
                    <blockquote class="mb-5">
                      <p>
                        &ldquo;Rasanya enak,pelayanan bagus serta gratis ongkir. Pokoknya mantappp..&rdquo;
                      </p>
                    </blockquote>

                    <div class="author-info">
                      <div class="author-pic">
                        <img src="images/person_1.jpg" alt="Tegar" class="img-fluid" />
                      </div>
                      <h3 class="font-weight-bold">Tegar</h3>
                      <span class="position d-block mb-3">Naks gaul, Donan Inc.</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END item -->

            <div class="item">
              <div class="row justify-content-center">
                <div class="col-lg-8 mx-auto">
                  <div class="testimonial-block text-center">
                    <blockquote class="mb-5">
                      <p>
                        &ldquo;Pelayanan yang sangat cepat dan memudahkan untuk restock produk.&rdquo;
                      </p>
                    </blockquote>

                    <div class="author-info">
                      <div class="author-pic">
                        <img src="images/person_2.jpg" alt="Purboyo" class="img-fluid" />
                      </div>
                      <h3 class="font-weight-bold">Purboyo Broto U.</h3>
                      <span class="position d-block mb-3">Bakul becer, Kawunganten Inc.</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END item -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Testimonial Slider -->

<?php
include 'footer.php';
?>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/tiny-slider.js"></script>
<script src="js/custom.js"></script>
</body>

</html>