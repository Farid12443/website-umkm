<?php
session_start();
include "../config/connection.php";

// pastikan user login
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Silakan login terlebih dahulu!'); window.location='../public/login.php';</script>";
    exit;
}

$id_user = $_SESSION['user_id'];
$id_produk = $_POST['id_produk'];


$cek = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_user='$id_user' AND id_produk='$id_produk'");
if (mysqli_num_rows($cek) > 0) {
    mysqli_query($conn, "UPDATE keranjang SET jumlah = jumlah + 1 WHERE id_user='$id_user' AND id_produk='$id_produk'");
} else {
    mysqli_query($conn, "INSERT INTO keranjang (id_user, id_produk, jumlah) VALUES ('$id_user', '$id_produk', 1)");
}

echo "<script>alert('Produk berhasil ditambahkan ke keranjang!'); window.location='../public/cart.php';</script>";
?>