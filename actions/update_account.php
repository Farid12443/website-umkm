<?php
session_start();
include "../config/connection.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../public/login.php");
    exit;
}

$id_user = $_SESSION['user_id'];

$nama = $_POST['nama'] ?? '';
$email = $_POST['email'] ?? '';
$alamat = $_POST['alamat'] ?? '';
$password_lama = $_POST['password_lama'] ?? '';
$password_baru = $_POST['password_baru'] ?? '';
$konfirmasi_password = $_POST['konfirmasi_password'] ?? '';

// ambil data user 
$query_user = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_user'");
$user = mysqli_fetch_assoc($query_user);

// konfirmasi password
if (!password_verify($password_lama, $user['kata_sandi'])) {
    echo "<script>alert('Password lama salah!'); window.history.back();</script>";
    exit;
}

//ganti password baru & konfirmasi
if ($password_baru !== $konfirmasi_password) {
    echo "<script>alert('Konfirmasi password baru tidak cocok!'); window.history.back();</script>";
    exit;
}

// hash passwor baru
$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

// update data
$update = mysqli_query($conn, "UPDATE user SET 
    nama_lengkap = '$nama', 
    email = '$email', 
    alamat = '$alamat', 
    kata_sandi = '$password_hash' 
    WHERE id_user = '$id_user'
");

// cek hasil
if ($update) {
    $_SESSION['nama'] = $nama;
    $_SESSION['email'] = $email;
    $_SESSION['alamat'] = $alamat;

    echo "<script>alert('Data berhasil diperbarui!'); window.location='../public/profil.php';</script>";
} else {
    echo "<script>alert('Gagal memperbarui data!'); window.history.back();</script>";
}
