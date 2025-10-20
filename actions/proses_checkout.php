<?php
session_start();
include "../config/connection.php";
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "message" => "User belum login"]);
    exit;
}

$id_user = $_SESSION['user_id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$metode = $_POST['metode_pembayaran'];

// Ambil isi keranjang user
$query_cart = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_user = '$id_user'");
if (mysqli_num_rows($query_cart) == 0) {
    echo json_encode(["status" => "error", "message" => "Keranjang kosong"]);
    exit;
}

// Validasi stok
while ($row = mysqli_fetch_assoc($query_cart)) {
    $id_produk = $row['id_produk'];
    $jumlah = $row['jumlah'];
    $produk = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_produk'"));

    if ($produk['stok'] <= 0) {
        echo json_encode(["status" => "error", "message" => "Stok habis untuk produk {$produk['nama_produk']}"]);
        exit;
    } elseif ($produk['stok'] < $jumlah) {
        echo json_encode(["status" => "error", "message" => "Stok kurang untuk produk {$produk['nama_produk']}"]);
        exit;
    }
}

// Reset pointer
mysqli_data_seek($query_cart, 0);

// Hitung total
$total_harga = 0;
while ($row = mysqli_fetch_assoc($query_cart)) {
    $produk = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '{$row['id_produk']}'"));
    $total_harga += $produk['harga'] * $row['jumlah'];
}

// Simpan transaksi
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
    mysqli_query($conn, "UPDATE produk SET stok = stok - {$row['jumlah']} WHERE id_produk = '{$row['id_produk']}'");
}

// Hapus keranjang
mysqli_query($conn, "DELETE FROM keranjang WHERE id_user = '$id_user'");

// ✅ kirim respon JSON ke fetch
echo json_encode(["status" => "success"]);
exit;
?>