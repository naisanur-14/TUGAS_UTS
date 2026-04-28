<?php
$halaman = basename($_SERVER['PHP_SELF']);
?>

<style>
html, body {
  height: 100%;
  margin: 0;
}

/* SIDEBAR */
.sidebar {
  min-height: 100vh;
  background: #198754;
  color: white;
  padding: 20px;
}

/* LINK */
.sidebar a {
  display: block;
  color: white;
  padding: 10px;
  border-radius: 8px;
  text-decoration: none;
  transition: all 0.3s ease;
}

/* HOVER */
.sidebar a:hover {
  background: #157347;
  padding-left: 12px;
}

/* ACTIVE */
.active-menu {
  background: white;
  color: #198754 !important;
  font-weight: bold;
}
</style>

<div class="sidebar">

  <h5 class="mb-4">Menu</h5>

  <a href="admin.php"
     class="<?= ($halaman == 'admin.php') ? 'active-menu' : '' ?>">
    Dashboard
  </a>

  <a href="tambah.php"
     class="<?= ($halaman == 'tambah.php') ? 'active-menu' : '' ?>">
    Tambah Produk
  </a>

</div>