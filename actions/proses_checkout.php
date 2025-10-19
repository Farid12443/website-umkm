<?php
session_start();
include "../config/connection.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

$id_user = $_SESSION['user_id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$metode = $_POST['metode_pembayaran'];

// Ambil isi keranjang user
$query_cart = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_user = '$id_user'");
$total_harga = 0;

// === Validasi stok sebelum checkout ===
while ($row = mysqli_fetch_assoc($query_cart)) {
    $id_produk = $row['id_produk'];
    $jumlah = $row['jumlah'];

    $produk = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_produk'"));

    // Cek apakah stok cukup
    if ($produk['stok'] <= 0) {
        header("Location: ../public/cart.php?error=stok_habis&produk=" . urlencode($produk['nama_produk']));
        exit;
    } elseif ($produk['stok'] < $jumlah) {
        header("Location: ../public/cart.php?error=stok_kurang&produk=" . urlencode($produk['nama_produk']));
        exit;
    }
}

// total harga
mysqli_data_seek($query_cart, 0);
while ($row = mysqli_fetch_assoc($query_cart)) {
    $produk = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '{$row['id_produk']}'"));
    $total_harga += $produk['harga'] * $row['jumlah'];
}

// Simpan ke tabel transaksi
mysqli_query($conn, "INSERT INTO transaksi (id_user, total_harga, metode_pembayaran, nama, alamat, no_hp)
                     VALUES ('$id_user', '$total_harga', '$metode', '$nama', '$alamat', '$no_hp')");

$id_transaksi = mysqli_insert_id($conn);

// Simpan detail transaksi & kurangi stok
mysqli_data_seek($query_cart, 0);
while ($row = mysqli_fetch_assoc($query_cart)) {
    $produk = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '{$row['id_produk']}'"));
    $subtotal = $produk['harga'] * $row['jumlah'];

    mysqli_query($conn, "INSERT INTO transaksi_detail (id_transaksi, id_produk, jumlah, subtotal)
                         VALUES ('$id_transaksi', '{$row['id_produk']}', '{$row['jumlah']}', '$subtotal')");

    // Kurangi stok
    mysqli_query($conn, "UPDATE produk SET stok = stok - {$row['jumlah']} WHERE id_produk = '{$row['id_produk']}'");
}

// Hapus keranjang
mysqli_query($conn, "DELETE FROM keranjang WHERE id_user = '$id_user'");

// Redirect sukses
header("Location: ../public/cart.php?success=1");
exit;
