<?php
include 'koneksi.php';
include 'navbar.php';

$cari = isset($_GET['cari']) ? $_GET['cari'] : '';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php if($cari != '') { ?>

<!-- 🔍 HASIL PENCARIAN -->
<div class="container mt-5">

    <h4 class="mb-3 text-success">
        Hasil pencarian: "<?= $cari ?>"
    </h4>

    <div class="d-flex flex-wrap gap-3">

<?php
$result = mysqli_query($conn, "SELECT * FROM produk 
                              WHERE nama_produk LIKE '%$cari%'");

if(mysqli_num_rows($result) > 0){

while($row = mysqli_fetch_assoc($result)){
?>

        <div class="card shadow-sm" style="width:200px;">
            <img src="gambar/<?= $row['gambar']; ?>" 
                 class="card-img-top"
                 style="height:150px; object-fit:cover;">

            <div class="card-body text-center">
                <h6><?= $row['nama_produk']; ?></h6>

                <p class="text-success fw-bold">
                    Rp <?= number_format($row['harga'],0,',','.'); ?>
                </p>

                <a href="tambah_cart.php?id=<?= $row['id']; ?>" 
                   class="btn btn-success w-100">
                   + Keranjang
                </a>
            </div>
        </div>

<?php } } else { ?>

    <p>Produk tidak ditemukan 😢</p>

<?php } ?>

    </div>
</div>

<?php } else { ?>

<!-- 📦 TAMPILAN KATEGORI -->
<?php
$kategoriList = ['makanan', 'kebersihan', 'minuman'];

foreach ($kategoriList as $kategori) {
?>

<div class="container mt-5">

    <h4 class="mb-3 text-success text-uppercase">
        <?= $kategori ?>
    </h4>

    <div class="d-flex overflow-auto gap-3">

<?php
$result = mysqli_query($conn, "SELECT * FROM produk WHERE kategori='$kategori'");

while($row = mysqli_fetch_assoc($result)){
?>

        <div class="card shadow-sm flex-shrink-0" style="width:200px;">

            <img src="gambar/<?= $row['gambar']; ?>" 
                 class="card-img-top"
                 style="height:150px; object-fit:cover;">

            <div class="card-body d-flex flex-column text-center">

                <h6><?= $row['nama_produk']; ?></h6>

                <p class="text-success fw-bold">
                    Rp <?= number_format($row['harga'],0,',','.'); ?>
                </p>

                <a href="tambah_cart.php?id=<?= $row['id']; ?>" 
                   class="btn btn-success mt-auto w-100">
                   + Keranjang
                </a>

            </div>

        </div>

<?php } ?>

    </div>
</div>

<?php } ?>

<?php } ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>