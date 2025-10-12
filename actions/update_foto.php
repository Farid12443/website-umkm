<?php
session_start();
include "../config/connection.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../public/login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if (isset($_FILES['foto'])) {
    $file_name = $_FILES['foto']['name'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($file_name);

    if (move_uploaded_file($file_tmp, $target_file)) {
        // update footo database
        $query = "UPDATE user SET foto = '$file_name' WHERE id_user = '$user_id'";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Foto profil berhasil diperbarui!'); window.location='../public/profil.php';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui database.');</script>";
        }
    } else {
        echo "<script>alert('Gagal mengunggah file.');</script>";
    }
}
?>