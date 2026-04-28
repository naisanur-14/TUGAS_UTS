<?php
session_start();

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// kalau produk sudah ada → tambah jumlah
if(isset($_SESSION['cart'][$id])){
    $_SESSION['cart'][$id]++;
} else {
    // kalau belum → set jadi 1
    $_SESSION['cart'][$id] = 1;
}

// balik ke keranjang
header("Location: cart.php");
exit;
?>