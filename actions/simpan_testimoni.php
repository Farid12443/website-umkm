<?php
include '../config/connection.php';
session_start();

if (isset($_POST['id_user']) && isset($_POST['rating']) && isset($_POST['pesan'])) {
    $id_user = $_POST['id_user'];
    $rating = $_POST['rating'];
    $pesan = $_POST['pesan'];

    // Validasi rating biar 1–5 aja
    if ($rating < 1 || $rating > 5) {
        echo "<script>alert('Rating harus antara 1 sampai 5!'); window.history.back();</script>";
        exit;
    }

    $query = "INSERT INTO testimoni (id_user, rating, pesan) VALUES ('$id_user', '$rating', '$pesan')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Terima kasih! Testimoni berhasil dikirim.'); window.location.href = '../public/index.php#testimonial';</script>";
    } else {
        echo "Gagal menyimpan testimoni: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Data tidak lengkap.'); window.history.back();</script>";
}
?>