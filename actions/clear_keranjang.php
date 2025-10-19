<?php
session_start();
include "../config/connection.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

$id_user = $_SESSION['user_id'];
mysqli_query($conn, "DELETE FROM keranjang WHERE id_user = '$id_user'");
?>

<script>
    alert("Keranjang berhasil dikosongkan!");
    // Gunakan replace agar clear_keranjang.php tidak masuk ke history browser
    window.location.replace("../public/cart.php");
</script>
