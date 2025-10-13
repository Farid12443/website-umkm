<?php
session_start();
session_unset();
session_destroy();

// kembali ke halaman login
header("Location: ../public/login.php");
exit;
?>