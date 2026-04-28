<?php
session_start();
include 'koneksi.php';

// pastikan cart ada
if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Keranjang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

  <a href="index.php" class="btn btn-outline-success mb-3">
    ← Kembali ke Home
  </a>

  <h3 class="mb-4">Keranjang Belanja</h3>

<?php if (empty($_SESSION['cart'])) { ?>
  <div class="alert alert-warning text-center">
    Keranjang masih kosong 😢
  </div>
<?php } else { ?>

<div class="row g-3">

<?php 
$total = 0;

foreach ($_SESSION['cart'] as $id => $qty) {

  $id = intval($id); // biar aman

  // ✅ FIX DI SINI (pakai id, bukan id_produk)
  $result = mysqli_query($conn, "SELECT * FROM produk WHERE id=$id");
  $row = mysqli_fetch_assoc($result);

  // kalau data gak ketemu, skip
  if (!$row) continue;

  $subtotal = $row['harga'] * $qty;
  $total += $subtotal;
?>

  <div class="col-12 col-md-6 col-lg-4">

    <div class="card shadow-sm h-100">

      <!-- GAMBAR -->
      <img src="gambar/<?= $row['gambar']; ?>" 
           class="card-img-top"
           style="height:150px; object-fit:cover;">

      <!-- BODY -->
      <div class="card-body text-center">

        <h6><?= $row['nama_produk']; ?></h6>

        <p class="text-muted">
          Rp <?= number_format($row['harga'],0,',','.'); ?>
        </p>

        <!-- 🔥 TOMBOL JUMLAH -->
        <div class="d-flex justify-content-center align-items-center gap-2 mb-2">

          <a href="kurang.php?id=<?= $id; ?>" 
             class="btn btn-sm btn-outline-danger">➖</a>

          <span class="fw-bold"><?= $qty; ?></span>

          <a href="tambah_cart.php?id=<?= $id; ?>" 
             class="btn btn-sm btn-outline-success">➕</a>

        </div>

        <!-- SUBTOTAL -->
        <p class="fw-bold text-success">
          Rp <?= number_format($subtotal,0,',','.'); ?>
        </p>

        <!-- HAPUS -->
        <a href="hapus.php?id=<?= $id; ?>" 
           class="btn btn-danger btn-sm w-100"
           onclick="return confirm('Yakin mau hapus produk ini?')">
           🗑️ Hapus
        </a>

      </div>

    </div>

  </div>

<?php } ?>

</div>

<!-- TOTAL -->
<div class="mt-4 text-end">
  <h4>Total: Rp <?= number_format($total,0,',','.'); ?></h4>
</div>

<?php } ?>

</div>

</body>
</html>