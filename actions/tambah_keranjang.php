<?php
session_start();
include "../config/connection.php";

// Pastikan user login
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Silakan login terlebih dahulu!'); window.location='../public/login.php';</script>";
    exit;
}

$id_user = $_SESSION['user_id'];
$id_produk = $_POST['id_produk'];

// Ambil data produk
$produk = mysqli_query($conn, "SELECT stok, nama_produk FROM produk WHERE id_produk='$id_produk'");
$data = mysqli_fetch_assoc($produk);

// Jika produk tidak ditemukan
if (!$data) {
    echo "<script>alert('Produk tidak ditemukan!'); window.history.back();</script>";
    exit;
}

// Cek stok produk
$stok = $data['stok'];
$nama_produk = $data['nama_produk'];

if ($stok <= 0) {
    echo "<script>
        alert('Stok produk \"$nama_produk\" sedang habis! Tidak dapat menambahkan ke keranjang.');
        window.history.back();
    </script>";
    exit;
}

// Cek apakah produk sudah ada di keranjang
$cek = mysqli_query($conn, "SELECT jumlah FROM keranjang WHERE id_user='$id_user' AND id_produk='$id_produk'");

if (mysqli_num_rows($cek) > 0) {
    $data_keranjang = mysqli_fetch_assoc($cek);
    $jumlah_sekarang = $data_keranjang['jumlah'];

    // Cegah penambahan jika jumlah di keranjang sudah mencapai stok
    if ($jumlah_sekarang >= $stok) {
        echo "<script>
            alert('Jumlah produk \"$nama_produk\" di keranjang sudah mencapai batas stok ($stok).');
            window.history.back();
        </script>";
        exit;
    }

    mysqli_query($conn, "UPDATE keranjang SET jumlah = jumlah + 1 WHERE id_user='$id_user' AND id_produk='$id_produk'");
    echo "<script>
        alert('Jumlah produk \"$nama_produk\" di keranjang berhasil ditambahkan!');
        window.location='../public/cart.php';
    </script>";
} else {
    mysqli_query($conn, "INSERT INTO keranjang (id_user, id_produk, jumlah) VALUES ('$id_user', '$id_produk', 1)");
    echo "<script>
        alert('Produk \"$nama_produk\" berhasil ditambahkan ke keranjang!');
        window.location='../public/cart.php';
    </script>";
}
?>
    