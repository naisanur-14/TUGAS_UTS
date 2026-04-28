<?php
include '../koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM produk");
$count = mysqli_num_rows($data);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      margin: 0;
      background: #f4f6f9;
    }

    /* SIDEBAR */
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

    /* CONTENT */
    .content {
      flex: 1;
      padding: 30px;
    }

    .card-box {
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    table {
      background: white;
      border-radius: 10px;
      overflow: hidden;
    }
  </style>
</head>

<body>

<div class="d-flex">

  <!-- SIDEBAR -->
  <div class="sidebar">

    <h5 class="mb-4">Admin</h5>

    <a href="admin.php" class="active-menu">Dashboard</a>
    <a href="tambah.php">Tambah Produk</a>

  </div>

  <!-- CONTENT -->
  <div class="content">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3 class="fw-bold">Dashboard</h3>
      <a href="#" class="btn btn-danger">Logout</a>
    </div>

    <!-- CARD -->
    <div class="row mb-4">
      <div class="col-md-4">
        <div class="card card-box p-3">
          <h6>Total Produk</h6>
          <h3><?= $count; ?></h3>
        </div>
      </div>
    </div>

    <!-- SEARCH -->
    <form class="d-flex mb-3">
      <input class="form-control me-2" type="search" placeholder="Cari produk...">
      <button class="btn btn-success">Cari</button>
    </form>

    <!-- TABEL -->
    <div class="card p-3 card-box">
      <table class="table table-hover align-middle">

        <thead class="table-success">
          <tr>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>

<?php while($row = mysqli_fetch_assoc($data)){ ?>

<tr>

  <td>
    <img src="../gambar/<?= $row['gambar']; ?>"
         style="width:60px; height:60px; object-fit:cover; border-radius:8px;">
  </td>

  <td><?= $row['nama_produk']; ?></td>

  <td class="text-success fw-bold">
    Rp <?= number_format($row['harga'],0,',','.'); ?>
  </td>

  <td>
    <a href="hapus.php?id=<?= $row['id']; ?>" 
       class="btn btn-danger btn-sm">
       Hapus
    </a>
  </td>

</tr>

<?php } ?>

        </tbody>

      </table>
    </div>

  </div>

</div>

</body>
</html>