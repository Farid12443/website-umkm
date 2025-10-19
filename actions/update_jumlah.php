<?php
session_start();
include "../config/connection.php";

// Pastikan user login
if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "message" => "User belum login"]);
    exit;
}

if (isset($_POST['id_keranjang']) && isset($_POST['jumlah'])) {
    $id_keranjang = intval($_POST['id_keranjang']);
    $jumlah = intval($_POST['jumlah']);
    $id_user = $_SESSION['user_id'];

    // Update jumlah produk di keranjang milik user ini
    $query = "UPDATE keranjang SET jumlah = '$jumlah' WHERE id_keranjang = '$id_keranjang' AND id_user = '$id_user'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($conn)]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Data tidak lengkap"]);
}
?>