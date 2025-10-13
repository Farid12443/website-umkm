<?php
session_start();
include "../config/connection.php";

// pastikan user login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../public/login.php");
    exit;
}

$id_user = $_SESSION['user_id'];

// hapus foto (kalau ada)
$getFoto = mysqli_query($conn, "SELECT foto FROM user WHERE id_user = '$id_user'");
if ($getFoto && mysqli_num_rows($getFoto) > 0) {
    $data = mysqli_fetch_assoc($getFoto);
    if (!empty($data['foto'])) {
        $path = "../uploads/" . $data['foto'];
        if (file_exists($path)) unlink($path);
    }
}

// hapus data user
$delete = mysqli_query($conn, "DELETE FROM user WHERE id_user = '$id_user'");

if ($delete) {
    session_unset();
    session_destroy();
    echo "<script>alert('Akun berhasil dihapus!'); window.location='../public/register.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus akun!'); window.history.back();</script>";
}
