<?php
include "../config/connection.php";
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

$idProduct = $_GET['id'] ?? 0;

if ($idProduct <= 0) {
    die("ID produk tidak valid!");
}

// nonaktifkan
$stmt = $conn->prepare("UPDATE produk SET status = 'inactive' WHERE id_produk = ?");
$stmt->bind_param("i", $idProduct);

if ($stmt->execute()) {
    echo "<script>alert('Produk berhasil dihapus!'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Produk gagal dihapus!'); window.location='index.php';</script>";
}

$stmt->close();
$conn->close();
?>