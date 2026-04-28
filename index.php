<?php
include 'koneksi.php';
include 'navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Toko Online</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<!-- BANNER -->
<div class="container-fluid bg-success text-white text-center py-5">
    <h2 class="fw-bold">Selamat Datang di Naisa Store</h2>
    <p>Belanja kebutuhan sehari-hari dengan mudah & cepat</p>
</div>

<!-- CAROUSEL -->
<div id="carouselNaisa" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">

  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselNaisa" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#carouselNaisa" data-bs-slide-to="1"></button>
  </div>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="gambar/baner1.jpg" class="d-block w-100" style="height:350px; object-fit:cover;">
    </div>

    <div class="carousel-item">
      <img src="gambar/baner2.jpg" class="d-block w-100" style="height:350px; object-fit:cover;">
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselNaisa" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>

  <button class="carousel-control-next" type="button" data-bs-target="#carouselNaisa" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>

</div>

<!-- PRODUK UNGGULAN -->
<?php
$result = mysqli_query($conn, "SELECT * FROM produk LIMIT 4");
?>

<div class="container mt-5">
  <h3 class="text-center mb-4">Produk Unggulan</h3>

  <div class="row">

  <?php while($row = mysqli_fetch_assoc($result)){ ?>

    <div class="col-md-3 mb-3">
      <div class="card shadow-sm">

        <img src="gambar/<?= $row['gambar']; ?>" class="card-img-top"
             style="height:200px; object-fit:cover;">

        <div class="card-body text-center">
          <h5><?= $row['nama_produk']; ?></h5>
        </div>

      </div>
    </div>

  <?php } ?>

  </div>
</div>

<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>