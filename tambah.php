<?php
include '../koneksi.php';

if(isset($_POST['simpan'])){

  $nama     = $_POST['nama'];
  $harga    = $_POST['harga'];
  $kategori = $_POST['kategori'];

  $gambar = $_FILES['gambar']['name'];
  $tmp    = $_FILES['gambar']['tmp_name'];

  $namaBaru = time() . '_' . $gambar;

  move_uploaded_file($tmp, "../gambar/".$namaBaru);

  mysqli_query($conn, "INSERT INTO produk (nama_produk, harga, gambar, kategori)
                       VALUES ('$nama','$harga','$namaBaru','$kategori')");

  echo "<script>alert('Produk berhasil ditambah!');window.location='admin.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah Produk</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      margin: 0;
      background: #f4f6f9;
    }

    .sidebar {
      width: 230px;
      min-height: 100vh;
      background: #198754;
      color: white;
      padding: 20px;
    }

    .sidebar a {
      display: block;
      color: white;
      padding: 10px;
      border-radius: 8px;
      text-decoration: none;
      transition: 0.3s;
    }

    .sidebar a:hover {
      background: #157347;
      padding-left: 12px;
    }

    .active-menu {
      background: white;
      color: #198754 !important;
      font-weight: bold;
    }

    .content {
      flex: 1;
      padding: 30px;
    }

    .card-box {
      max-width: 500px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      background: white;
      padding: 25px;
    }
  </style>
</head>

<body>

<div class="d-flex">

  <!-- SIDEBAR -->
  <div class="sidebar">
    <h5 class="mb-4">Admin</h5>

    <a href="admin.php">Dashboard</a>
    <a href="tambah.php" class="active-menu">Tambah Produk</a>
  </div>

  <!-- CONTENT -->
  <div class="content">

    <h3 class="mb-4">Tambah Produk</h3>

    <div class="card-box">

      <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">
          <label>Nama Produk</label>
          <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
          <label>Harga</label>
          <input type="number" name="harga" class="form-control" required>
        </div>

        <!-- ✅ KATEGORI DITAMBAHKAN -->
        <div class="mb-3">
          <label>Kategori</label>
          <select name="kategori" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            <option value="kebersihan">kebersihan</option>
            <option value="Minuman">Minuman</option>
            <option value="Makanan">Makanan</option>
          </select>
        </div>

        <div class="mb-3">
          <label>Gambar</label>
          <input type="file" name="gambar" class="form-control" required>
        </div>

        <button type="submit" name="simpan" class="btn btn-success w-100">
          Simpan Produk
        </button>

        <a href="admin.php" class="btn btn-secondary w-100 mt-2">
          Kembali
        </a>

      </form>

    </div>

  </div>

</div>

</body>
</html>