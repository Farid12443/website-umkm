<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "web_umkm";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi berhasil";
}   
?>