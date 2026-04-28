<?php
session_start();

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

unset($_SESSION['cart'][$id]);

header("Location: cart.php");
exit;
?>