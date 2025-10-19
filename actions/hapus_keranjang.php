<?php
session_start();
include "../config/connection.php";

// pastikan user login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

// pastikan ada item di keranjang
if (isset($_POST['id_keranjang'])) {
    $id_keranjang = $_POST['id_keranjang'];
    $id_user = $_SESSION['user_id'];

    // hapus hanya milik user ini
    $query = "DELETE FROM keranjang WHERE id_keranjang = '$id_keranjang' AND id_user = '$id_user'";
    if (mysqli_query($conn, $query)) {
        
        header("Location: ../public/cart.php");
        exit;
    } else {
        echo "Gagal menghapus item dari keranjang: " . mysqli_error($conn);
    }
} else {
    echo "Tidak ada data yang dikirim.";
}
?>
