<?php
include "../config/connection.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "unauthorized"]);
    exit;
}

$id_user = $_SESSION['user_id'];
$id_keranjang = $_POST['id_keranjang'] ?? 0;
$jumlah = $_POST['jumlah'] ?? 1;

if ($id_keranjang <= 0 || $jumlah <= 0) {
    echo json_encode(["status" => "invalid"]);
    exit;
}

// Update jumlah di keranjang milik user
$stmt = $conn->prepare("UPDATE keranjang SET jumlah = ? WHERE id_keranjang = ? AND id_user = ?");
$stmt->bind_param("iii", $jumlah, $id_keranjang, $id_user);

if ($stmt->execute()) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error"]);
}

$stmt->close();
$conn->close();
